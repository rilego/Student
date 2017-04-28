<?php  
	/*
		*  名称：数据库操作类
		*  作用：提供数据库操作方法
		*  作者：祁燕辉
		*  时间：2016/12/12 15:54 
	*/

	class Model{
		public $field;      //字段
		public $tab;        //表名
		public $where;      //条件
		public $order;      //排序方式
		public $limit;      //限制条件
		public $group;
		public $aaa;

		function __construct($tab) {
			mysql_connect(HOST, USER, PASS);
			mysql_select_db(DBNAME);
			mysql_query("set names utf8");
			$this -> tab = $tab;

		}

		function field($field) {
			$this -> field = $field;
			return $this;
		}

		function where($where) {
			$this -> where = "where ".$where;
			return $this;
		}

        function aaa($aaa)
        {
        	$this -> aaa = $aaa;
        	return $this;
        }

		function order($order) {
			$this -> order = "order by ".$order;
			return $this;
		}

		function group($group) {
			$this -> group = " group by ".$group;
			return $this;
		}

		function limit($limit) {
			$this -> limit = "limit ".$limit;
			return $this; 
		}

		function select($all="") {
			if($all) {
				$sql = "select $all from {$this -> tab} order by id";
			}else{
				$sql = "select {$this -> field} from {$this -> tab} {$this -> where} {$this -> group} {$this -> order} {$this -> limit}";
			}

			/*echo $sql;
			exit;*/
			$rst = mysql_query($sql);
			
			while($row = mysql_fetch_assoc($rst)){
				$rows[] = $row;
			}
			return $rows;
		}

		function insert($post) {
			foreach($post as $key => $val) {
				$keys[] = $key;
				$vals[] = "'".$val."'";
			}

			$keystr = join(",", $keys);
			$valstr = join(",", $vals);

			$sql = "insert into {$this -> tab}($keystr) values($valstr)";
			
			if(mysql_query($sql)){
				return mysql_insert_id();
			}else{
				return false;
			}
		}

		//删除sql语句
		function delete() {
			$sql = "delete from {$this -> tab} {$this -> where}";
			/*echo $sql;
			exit;*/
			if(mysql_query($sql)){
				return mysql_affected_rows();
			}else{
				return false;
			}
		}

		//更改语句
		function update($post) {
			foreach($post as $key => $val){
				$sets[] = "{$key} = '{$val}'";
			}

			$setstr = "set ".join(",", $sets);
			$sql = "update {$this -> tab} {$setstr} {$this -> where}";

			if(mysql_query($sql)){
				return mysql_affected_rows();
			}else{
				return false;
			}
		}

		//从表中取出一条数据
		function find(){
			if($this -> order ) {
				$sql = "select * from {$this -> tab} {$this -> order} limit 1";
			}else{
				$sql = "select * from {$this -> tab} order by id limit 1";
			}

			$rst = mysql_query($sql);
			$row = mysql_fetch_assoc($rst);
			return $row;
		}

		//获取表的总行数
		function total() {
			$sql = "select count(*) from {$this -> tab}";
			$rst = mysql_query($sql);
			$row = mysql_fetch_row($rst);
			return $row[0];
		}
	}



?>