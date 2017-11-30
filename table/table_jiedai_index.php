<?php
/**
 * User: SAKILL
 * Url：http://www.sakill.com
 * QQ : 1017615760;
 * Date: 2017/11/14
 */

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_jiedai_index extends discuz_table {
    public function __construct() {
        $this->_table = 'bc_jiedai_profile';
        $this->_pk    = 'id';

        parent::__construct();
    }
    public function getall($param)
    {

        $query = DB::fetch_all('SELECT * FROM ' . DB::table($this->_table).' order by date desc limit '.$param);
        return $query;

    }

    public function get_list(){
        $query = DB::fetch_all('SELECT * FROM ' . DB::table($this->_table));
        return $query;
    }

    public function delall($id){

        $sql = DB::format('delete from %t where id in(%i)',array($this->_table,$id));
        DB::query($sql);

    }
}

?>