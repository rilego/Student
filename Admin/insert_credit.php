<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");

	//获取要添加成绩的课程id
	$courseid = $_POST['hiddenid'];
	$credit = $_POST['credit'];
	$user = new Model("select_course");
	for($i = 0; $i < count($credit); $i++){
		$sql = "update select_course set every_course='{$credit[$i]}' where id='{$courseid[$i]}'";
		$rst = mysql_query($sql);
	}
	if($rst){
		echo "<script>alert('录入成绩成功!\(^o^)/');location='../tea_grade.php';</script>";
	}else{
		echo mysql_error();
		echo "<script>alert('录入成绩失败!~~~~(>_<)~~~~ ');location='../course_every.php';</script>";
	}
 ?>