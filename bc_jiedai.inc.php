<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/bc_jiedai/include/config.php';
$mod=$_GET['mod'];
$menus=array('index','code','verifycode','delete');
$mod=in_array($mod,$menus)?$mod:'index';
require DISCUZ_ROOT.'./source/plugin/bc_jiedai/module/jiedai_'.$mod.'.php';
?>