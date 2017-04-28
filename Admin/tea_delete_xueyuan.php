<?php 
	/*
		*作用：删除用户指定的课程
	*/

	header("content-type:text/html;charset=utf8");
	include("./config.inc.php");
	include("Model.class.php");
	$courseid = $_GET[id];
	
	if($courseid){
		$selectcourse = new Model("DepartMent_info");
		$result = $selectcourse -> where("id={$courseid}") -> delete();
		if($result){
			echo "<script>alert('删除成功');location='../tea_xueyuan_all.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='../tea_xueyuan_all.php';</script>";
		}
	}else{
		echo "<script>alert('不能获取要删除的id值');location='../tea_xueyuan_all.php';</script>";
	}


 ?>