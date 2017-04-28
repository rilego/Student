<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");	

	$id = $_GET['id'];
	$coursename = $_POST['coursename'];
	$courseinfo = $_POST['courseinfo'];
	$credit = $_POST['credit'];
	$classtime = $_POST['classtime'];
	$teacher = $_POST['teacher'];
	$limitpeople = $_POST['limitpeople'];

	$post = array("CNO" => $courseinfo,"course_name" => $coursename,"course_cre" => $credit,"course_time" => $classtime,"course_teacher" => $teacher,"limit_num" => $limitpeople);

	if(empty($coursename) || empty($courseinfo) || empty($credit) || empty($classtime) || empty($teacher) || empty($limitpeople)){
		echo "<script>alert('不允许为空，请重新输入!');location='../tea_course_all.php';</script>";
	}else{
			$user = new Model("course_info");
			if($user -> where("id = $id") -> update($post)){
				echo "<script>alert('修改课程成功!\(^o^)/');location='../tea_course_all.php';</script>";
			}else{
				echo mysql_error();
				echo "<script>alert('修改课程失败失败!~~~~(>_<)~~~~ ');location='../tea_course_all.php';</script>";
			}
		}

 ?>