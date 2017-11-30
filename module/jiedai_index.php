<?php
/**
 * User: SAKILL
 * Url£ºhttp://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/11/12
 */


if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if ($_POST){
    $data=array(
        'amount'=>mb_convert_encoding( $_POST['amount'], "GBK"),
        'mobile'=>$_POST['mobile'],
        'address'=>mb_convert_encoding( $_POST['s_province'].$_POST['s_city'], "GBK"),
        'date'=>date("Y-m-d H:i:s"),
        'name'=>mb_convert_encoding($_POST['relname'], "GBK")
    );
    $lastid = C::t('#bc_jiedai#jiedai_index')->insert($data,true);

    $msg=1;
    echo json_encode($msg);
}
