<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");

	$username = $_POST['user'];
	$password = $_POST['pass'];
	$repassword = $_POST['repass'];
	$classid = $_POST['class_id'];

	$post = array("username" => $username,"password" => $password,"classid" => $classid);

	if(empty($username) || empty($password) || empty($repassword)){
		echo "<script>alert('不允许为空，请重新输入!');location='../zhuce.php';</script>";
	}else{
		if($password == $repassword) {
			$user = new Model("user");
			if($user -> insert($post)){
				echo "<script>alert('注册成功!');location='../index.php';</script>";
			}else{
				echo "<script>alert('注册失败!');location='../zhuce.php';</script>";
			}
		}else{
			echo "<script>alert('您输入的密码不一致，请重新输入!');location='../zhuce.php';</script>";
		}

	}
	
 ?>