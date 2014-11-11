<?php

/*
 * 视频播放控制器，所有页面都转跳PLAY控制器进行播放
 * 制作：曹文鹏   time 2014/3/28 11.15
 */

class PlayAction extends PublicAction {

    function index() {
        $id = I("id");            //视频Id
        $pid = I('pid');          //专辑类别
        $vMob = D('Video');      //首字母大写
        $cMob = D("VideoCat");
        $VideoType = D('VideoType');
        $VideoView = D('video_view');
        $userId = session(C('USER_AUTH_KEY'));  //登录用户ID
        if (!empty($pid)) {
            $where = "db_video.pid = '$pid' and db_video.isopen = '1'";
        } else {
            $where = "db_video.id = '$id' and db_video.isopen = '1'";
        }

        $video = $vMob->field("db_video.*,dvc.id as cid,dvc.name as cname,dvc.zhuanjino")
                ->join("db_video_cat dvc on dvc.id=db_video.pid")
                ->where($where)
                ->find(); //当前播放视频只取了一个 当为PID的时候也是如此
                //分割图片tag 获取标签信息
        $tagList = $video['tags'];
        $tagListArr = explode(',', $tagList);
        $newTagList = array();
        foreach ($tagListArr as $key => $value) {
            $newTagListArr = explode('|', $value);
            $newTagList[$key]['tagid'] = trim($newTagListArr[0]);
            $newTagList[$key]['tagname'] = trim($newTagListArr[1]);
        }
        $this->assign('tagList',$newTagList);
        if (!$video) {
            $this->_empty();
            return;
        }
        $curVideoType = $video['type'];
        $curVideoTypeArr = explode(',', $curVideoType);
        $typeId = $curVideoTypeArr[0];    //当前视频所属第一个类型ID
        $typeName = $VideoType->getTypeName($typeId);
        $pid = $video['pid'];
        $channel = $cMob->getChannel($pid);
        $this->assign('channel', $channel);

        $curVideoId = $video['id'];
        //播放数+1
        $vMob->where("id='$curVideoId'")->setInc('hits');
        //播放记录 流水账
        $ckVideoView = $VideoView->where("vid = '$curVideoId'")->find();
        if ($ckVideoView) {
            $id = $ckVideoView['id'];
            $data['ctime'] = time();
            $VideoView->where("id = '$id'")->save($data);
        } else {
            $VideoView->add(array(
                'vid' => $video['id'],
                'ctime' => time()
            ));
        }
        //添加播放记录
        if (!empty($userId)) {
            //如果有用户登录
            $UserSee = D('UserSee');   //用户观看记录表
            $today = date("Y-m-d", time());
            $today = strtotime($today);
            $ckSee = $UserSee->where("uid = $userId and vid = $curVideoId and seetime = '$today'")
                    ->find();
            if (!$ckSee) {
                $data['uid'] = $userId;
                $data['vid'] = $curVideoId;
                $data['seetime'] = $today;
                $UserSee->add($data);
            }
        }

        //开始播放记录 用于周 天 排行
        $today = date("Y-m-d", time());
        $today = strtotime($today);
        $Photo_hits = D('video_hits');
        $ckHits = $Photo_hits
                ->where("videoid = '$curVideoId'and time='$today'")
                ->find();
        if (!$ckHits) {
            $newHitsData['videoid'] = $curVideoId;
            $newHitsData['time'] = $today;
            $newHitsData['hits'] = 1;
            $Photo_hits->add($newHitsData);
        } else {
            //判断如果已经存在点击就是更新
            $Photo_hits->where("videoid = '$curVideoId'")
                    ->setInc('hits'); //字段加1
        }

        //是否是专辑
        $isAlbum = $video['zhuanjino'];  //是否是专辑
        if ($isAlbum == '0') {
            //如果不是专辑取出所在类型的10条视频进行相关
            $typeVideos = $vMob->getTypeVideo($typeId, 10);
            $this->assign('programme', $video['cname']);
            $this->assign('typeVideos', $typeVideos);
        } else {
            //取出父类类别名
            $catId = $cMob->getVideoCatId((int) $pid);
            $category = $cMob->getCategory($catId);
            $programme = $category['name'];
            $album = $video['cname'];
            $typeVideos = $vMob->field('id,title,photo,videotime')
                    ->where("isopen = 1 and pid = '$pid'")
                    ->order('addtime desc')
                    ->select();

            $this->assign('typeVideos', $typeVideos);
            $this->assign('album', $album);
            $this->assign('programme', $programme);
        }
        //相关专辑
        $relateAlbum = array();
        foreach ($curVideoTypeArr as $value) {
            $relateAlbumI = $cMob->field('id,name,coverimage')
                    ->where("isopen = 1 and zhuanjino = 1 and type like '%$value%'")
                    ->order('updatetime desc')  //updatetime 应为视频有添加时更改 保证最新更新视频被推荐
                    ->select();
            if (empty($relateAlbumI)) {
                $relateAlbumI = array();
            }
            $relateAlbum = array_merge($relateAlbum, $relateAlbumI);
        }
        $relateAlbum = array_slice($relateAlbum, 0, 4);  //取四个
        //热门视频
        $hotVideoList = $vMob->getHotVideos();
        foreach ($hotVideoList as $key => $value) {
            $pid = $value['pid'];
            $channel = $cMob->getChannel($pid);
            $hotVideoList[$key]['channel'] = $channel;
        }
        //热门资讯
        $hotNewsMob = D("News");
        $hotNews = $hotNewsMob->newsRank(10);
        //查询热门图片
        $hotPicMob = D("Picture");
        $hotPic = $hotPicMob->getHotPicRank(4);

        //评论区域开始
        $vid = $video['id'];
        $this->showComment($vid,'视频');

        $this->assign(array(
            'video' => $video,
            'hotVideoList' => $hotVideoList,
            'hotNews' => $hotNews,
            'hotPic' => $hotPic,
            'typeName' => $typeName,
            'relateAlbum' => $relateAlbum,
        ));
        $this->display();
    }

}
