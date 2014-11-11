<?php

/**
 * Encoding     :   UTF-8
 * Created on   :   2014-7-10 14:20:40 by 曹文鹏 , caowenpeng1990@126.com
 * For          :   站内信
 */
class MsgAction extends PublicAction {

    /**
     * 
     * @param array $msg
     */
    public function sendMsg(array $msg, $uniquecode = false) {
        list($oid, $title, $starttime, $endtime, $isemail, $isopen, $content, $author,$summary) = $msg;
        if ($uniquecode) {
            $code = createDiscountCode();
            $Member = D('Member');
            $user = $Member->where("id = '$oid'")->find();
            $name = $user['username'];
            $this->assign('name',$name);
            $this->assign('babycode',$code);
            $mailContent = $this->fetch('Mail:msg');
        }
        $Msg = D('Msg');
        $data['oid'] = $oid;
        $data['title'] = $title;
        $data['starttime'] = $starttime;
        $data['endtime'] = $endtime;
        $data['isemail'] = $isemail;
        $data['isopen'] = $isopen;
        $data['content'] = $mailContent;
        $data['summary'] = $summary;
        $data['author'] = $author;
        $data['ctime'] = date('Y-m-d H:i:s');
        $Msg->add($data);
        if ($isemail == '1' && $isopen == '1') {
          
            $id = $user['id'];
            $email = $user['email'];
            $Code = D('Code');
            $Code->add(array(
                'userid' => $id,
                'username' => $name,
                'code' => $code
            ));
            $address = array(
                array(
                    'address' => $email,
                    'name' => $name
                )
            );
             $this->assign('name',$name);
            $this->assign('babycode',$code);
            $content = $this->fetch('Mail:babycode');
            $this->sendEmail($address, $title, $content);
        }
    }

}
