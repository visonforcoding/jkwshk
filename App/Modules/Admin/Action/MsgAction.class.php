<?php

/**
* Encoding     :   UTF-8
* Created on   :   2014-8-25 16:40:00 by 曹文鹏 , caowenpeng1990@126.com
* For          :   站内信
*/
class MsgAction extends CommonAction{
   /**
     * 
     * @param array $msg
     */
    public function sendMsg(array $msg) {
        list($oid, $title, $starttime, $endtime, $isemail, $isopen, $content, $author,$summary) = $msg;
        $Msg = D('Msg');
        $data['oid'] = $oid;
        $data['title'] = $title;
        $data['starttime'] = $starttime;
        $data['endtime'] = $endtime;
        $data['isemail'] = $isemail;
        $data['isopen'] = $isopen;
        $data['content'] = $content;
        $data['summary'] = $summary;
        $data['author'] = $author;
        $data['ctime'] = date('Y-m-d H:i:s');
        $ck = $Msg->add($data);
         $SQL = $Msg->getLastSql(); //输出sql语句
         Log::record('发送站内信SQL：' . $SQL, Log::SQL);
        if ($isemail == '1' && $isopen == '1') {
            $id = $oid;
            $user = D('Member')->where("id = '$id'")->find();
            $name = $user['username'];
            $email = $user['email'];
            $address = array(
                array(
                    'address' => $email,
                    'name' => $name
                )
            );
            $this->assign('name',$name);
            $mailContent = $this->fetch('Mail:babycode');
            $this->sendEmail($address, $title, $mailContent);
        }
        
     if($ck){
         return true;
     }else{
         return false;
     }
    }

}
