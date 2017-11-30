<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
require_once DISCUZ_ROOT . './source/plugin/bc_jiedai/include/config.php';
$mod=$_GET['mod'];
$menus=array('list','delete');
$mod=in_array($mod,$menus)?$mod:'list';
require DISCUZ_ROOT.'./source/plugin/bc_jiedai/module/admin_'.$mod.'.php';
if(!$notemplate)
    include template('bc_jiedai:admin_' . $mod);
?>