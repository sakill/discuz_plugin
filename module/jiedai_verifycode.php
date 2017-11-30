<?php
/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc && plugin by zhanmishu.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      Author: zhanmishu.com $
 *    	qq:87883395 $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include_once DISCUZ_ROOT.'./source/plugin/zhanmishu_sms/include/function.php';
include_once DISCUZ_ROOT.'./source/plugin/zhanmishu_sms/include/Autoloader.php';
include_once DISCUZ_ROOT.'./source/plugin/zhanmishu_sms/include/zhanmishu_mobileverify.php';

$config=getconfig();

$data = array($config);
	
if($_GET['method']=='send'){
    $data['phone']=$_POST['mobile'];
    $data['code']=$_POST['code'];
    $data['product']='众鑫玩卡';
	$sendsms = new zhanmishu_sms($config);
//	$return = $sendsms->sendpost('15215256447',array('product'=>'AAA','code'=>'4567'),'2');
	$sendsms->type=2;
 	$return =  $sendsms->sendsms($data['phone'],$data['code']);
	echo json_encode($retursn); 
}elseif ($_GET['method']=='verify') {
	$data['verify'] = $_POST['verify'];
	$data['code']=$_POST['code'];
	$verify = new zhanmishu_sms($config,$data['code'],$data['verify']);
	$verify->type=2;
	$return = $verify->verify();
	echo json_encode($return);
}
	
    


?>