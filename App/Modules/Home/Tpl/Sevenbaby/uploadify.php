<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination

//���ļ���uploadify�ٷ��ṩ����һphp������������޸ĺ�ע��
$targetFolder = 'upload'; //�����ϴ�Ŀ¼

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];

	$targetFile =$targetFolder. '/' . $_FILES['Filedata']['name'];//�ϴ����ͼƬ·��
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); //������ļ���׺
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo $_FILES['Filedata']['name'];//�ϴ��ɹ��󷵻ظ�ǰ�˵�����
		file_put_contents($_POST['id'].'.txt','�ϴ��ɹ��ˣ�');
	} else {
		echo '��֧�ֵ��ļ�����';
	}
}
