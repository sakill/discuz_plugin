<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/11/12
 */


if ($_GET['delete']){
    C::t('#bc_jiedai#jiedai_index')->delete($_GET['id']);
    cpmsg('success!',$_SERVER['HTTP_REFERER']);
}elseif ($_GET['dc']){
    $title="手机号"."\t"."真实姓名"."\t"."贷款金额"."\t".	"居住地"."\t"."时间";
    $list='';
    $data=C::t('#bc_jiedai#jiedai_index')->get_list();
        foreach($data as $key => $field) {
            $list.=$field['mobile']."\t".$field['name']."\t".$field['amount']."\t".$field['address']."\t".$field['date']."\n";
        }

    $verifylist = $title."\n".$list;
    $filename = date('Ymd', TIMESTAMP).'.xls';
    define('FOOTERDISABLED', true);
    ob_end_clean();
    header("Content-type:application/vnd.ms-excel");
    header('Content-Encoding: none');
    header('Content-Disposition: attachment; filename='.$filename);
    header('Pragma: no-cache');
    header('Expires: 0');
    echo $verifylist;
    exit();
}else{
    $total=C::t('#bc_jiedai#jiedai_index')->count();
    $_page = new Page($total,10);
    $page=$_page->showpage();
    $data=C::t('#bc_jiedai#jiedai_index')->getall($_page->getLimit());
}
