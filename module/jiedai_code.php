<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/11/12
 */
//验证码
if ($_POST){
    if ($_POST['code']==getcookie('code')){
        $str=1;
        echo json_encode($str);
    }else{
        $str=-1;
        echo json_encode($str);
    }
}else{
    $_vc = new ValidateCode();
    $_vc->doimg();
    dsetcookie('code',$_vc->getCode());
}
