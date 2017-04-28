<?php 
	/*
		*作用：删除课程
	*/

	header("content-type:text/html;charset=utf8");
	include("./config.inc.php");
	include("Model.class.php");
	$courseid = $_GET[id];
	$name = $_GET['name'];
	/*echo $name;
	exit;*/
	/*echo $courseid;
	exit;*/
	if($courseid){
		$selectcourse = new Model("course_info");
		$result = $selectcourse -> where("id={$courseid}") -> delete();

		if($result){
			echo "<script>alert('删除成功');location='../tea_course_all.php';</script>";
		}else{
			echo "<script>alert('删除失败！');location='../tea_course_all.php';</script>";
		}
	}else{
		echo "<script>alert('不能获取要删除的id值');location='../tea_course_all.php';</script>";
	}


 ?>