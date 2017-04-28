<?php 
	/*
		*  名称：分页类
		*  作用：提供各页面的分页信息
		*  作者：祁燕辉
		*  时间：2016/12/12 10：22
	*/
	class Page{
		public $rownum;  //总行数
		public $length;  //每页行数
		public $pagenum;  //最大页数
		public $pagetot;  //总页数
		public $offset;  //从哪里开始截取多少个
		public $prevpage; //上一页
		public $nextpage;  //下一页
		public $limit;  //查询限定

		function __construct($rownum, $length) {
			$this -> rownum = $rownum;
			$this -> length = $length;
			$this -> pagenum = $_GET['page']?$_GET['page']:1;
			$this -> pagetot = $this ->pagetot();
			$this -> offset = $this -> offset();
			$this -> prevpage = $this -> prevpage();
			$this -> nextpage = $this -> nextpage();
			$this -> limit = "{$this -> offset}, {$this -> length}";
		}

		function offset(){
			return ($this -> pagenum-1)*$this -> length;
		}

		function pagetot(){
			return ceil($this -> rownum/$this -> length);
		}

		function prevpage(){
			if( $this -> pagenum <= 1 ){
				return 1;
			}
			return $this -> pagenum-1;
		}

		function nextpage(){
			if ( $this -> pagenum >= $this -> pagetot) {
				return $this -> pagetot;
			}
			return $this -> pagenum + 1;
		}

		function outpage(){
			echo "<h2><a href='index.php?page={$this -> precpage}'>上一页</a>|<a href='index.php?page={$this -> nextpage}'>下一页</a></h2>";
		}
	}


 ?>