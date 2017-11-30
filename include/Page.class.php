<?php
//��ҳ��
class Page {
	private $_total;										//�ܼ�¼
	private $_pagesize;								//ÿҳ��ʾ������
	private $_limit;										//limit
	private $_page;										//��ǰҳ��
	private $_pagenum;								//��ҳ��
	private $_url;											//��ַ
	private $_bothnum;								//���߱������ַ�ҳ����
	
	//���췽����ʼ��
	public function __construct($_total, $_pagesize) {
		$this->_total = $_total ? $_total : 1;
		$this->_pagesize = $_pagesize;
		$this->_pagenum = ceil($this->_total / $this->_pagesize);
		$this->_page = $this->setPage();
		$this->_limit = ($this->_page-1)*$this->_pagesize.",$this->_pagesize";
		$this->_url = $this->setUrl();
		$this->_bothnum = 2;
	}
	
	//��ȡlimit
	public function getLimit() {
		return $this->_limit;
	}
	
	//��ȡpage
	public function getPage() {
		return $this->_page;
	}
	
	//��ȡ��ǰҳ��
	private function setPage() {
		if (!empty($_GET['page'])) {
			if ($_GET['page'] > 0) {
				if ($_GET['page'] > $this->_pagenum) {
					return $this->_pagenum;
				} else {
					return $_GET['page'];
				}
			} else {
				return 1;
			}
		} else {
			return 1;
		}
	}	
	
	//��ȡ��ַ
	private function setUrl() {
		$_url = $_SERVER["REQUEST_URI"];
		$_par = parse_url($_url);
		if (isset($_par['query'])) {
			parse_str($_par['query'],$_query);
			unset($_query['page']);
			$_url = $_par['path'].'?'.http_build_query($_query);
		}
		return $_url;
	}

	//����Ŀ¼
	private function pageList() {
		$_pagelist = '';
		for ($i=$this->_bothnum;$i>=1;$i--) {
			$_page = $this->_page-$i;
			if ($_page < 1) continue;
			$_pagelist .= ' <a href="'.$this->_url.'&page='.$_page.'">'.$_page.'</a> ';
		}
		$_pagelist .= ' <span class="me">'.$this->_page.'</span> ';
		for ($i=1;$i<=$this->_bothnum;$i++) {
			$_page = $this->_page+$i;
			if ($_page > $this->_pagenum) break;
			$_pagelist .= ' <a href="'.$this->_url.'&page='.$_page.'">'.$_page.'</a> ';
		}
		return $_pagelist;
	}
	
	//��ҳ
	private function first() {
		if ($this->_page > $this->_bothnum+1) {
			return ' <a href="'.$this->_url.'">1</a> ...';
		}
	}
	
	//��һҳ
	private function prev() {
		if ($this->_page == 1) {
			return '<span class="disabled">��һҳ</span>';
		}
		return ' <a href="'.$this->_url.'&page='.($this->_page-1).'">��һҳ</a> ';
	}
	
	//��һҳ
	private function next() {
		if ($this->_page == $this->_pagenum) {
			return '<span class="disabled">��һҳ</span>';
		}
		return ' <a href="'.$this->_url.'&page='.($this->_page+1).'">��һҳ</a> ';
	}

	//βҳ
	private function last() {
		if ($this->_pagenum - $this->_page > $this->_bothnum) {
			return ' ...<a href="'.$this->_url.'&page='.$this->_pagenum.'">'.$this->_pagenum.'</a> ';
		}
	}
	
	//��ҳ��Ϣ
	public function showpage() {
		$_page = '';
		$_page .= $this->first();
		$_page .= $this->pageList();
		$_page .= $this->last();
		$_page .= $this->prev();
		$_page .= $this->next();
		return $_page;
	}
}
?>