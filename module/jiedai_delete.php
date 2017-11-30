<?php
/**
 * User: SAKILL
 * Url£ºhttp://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/11/12
 */


if ($_POST['data']){
    C::t('#bc_jiedai#jiedai_index')->delall($_POST['data']);
    echo json_encode(1);
}