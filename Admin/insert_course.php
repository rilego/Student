<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");

	//获取选取的课程id
	$courseid = $_GET['id'];
	$num1 = $_GET['num1'];
	$num2 = $_GET['num2'];

	$course = new Model("select_course");
	$result = $course -> field("*") -> where("cid={$courseid}") -> select();
	if($result){
		echo "<script>alert('您已选择该门课程，请选择其他课程!~~~~(>_<)~~~~ ');location='../stu_course_all.php';</script>";
	}else{
		if($num2 < $num1){
		//获取登陆用户的用户名，cookie存储
		$username = $_COOKIE['username'];
		//根据获取的用户名取出该用户的id值
		$selectid = new Model("student_info");
		$result = $selectid -> field("id,name") -> where("student_id={$username}") -> select();

		//根据获取的课程的id值，取出该课程的名称
		$coursename = new Model("course_info");
		$nameresult = $coursename -> field("*") -> where("id={$courseid}") -> select();

		$post = array(
			"select_course" => $nameresult[0]['course_name'],
			"sid" => $result[0]['id'],
			"cid" => $courseid,
			"select_son" => $nameresult[0]['CNO'],
			"select_credit" => $nameresult[0]['course_cre'],
			"select_time" => $nameresult[0]['course_time'],
			"select_teacher" => $nameresult[0]['course_teacher'],
			"every_name" => $result[0]['name']
			);
			$choosecourse = new Model("Select_course");
			if($choosecourse -> insert($post)){
				echo "<script>alert('选课成功!\(^o^)/');location='../stu_course_all.php';</script>";
			}else{
				echo mysql_error();
				echo "<script>alert('选课失败失败!~~~~(>_<)~~~~ ');location='../stu_course_all.php';</script>";
			}
	}else{
		echo "<script>alert('选课人数已达到上限，请选择其他课程!~~~~(>_<)~~~~ ');location='../stu_course_all.php';</script>";
	}
	}
	
	
	
 ?>