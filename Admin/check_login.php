<?php 
	session_start();
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$classid = $_POST['class_id'];

	if(empty($username) || empty($password)){
		echo "<script>alert('不允许为空，请重新输入!');location='../index.php';</script>";
	}else{
		$user = new Model("user");
		$result = $user -> field("username,password,classid") -> where("username='{$username}' and password='{$password}' and classid='{$classid}'") -> select();
		if($result){
			//设置登陆时间
			setcookie('username', $username, time()+3600, '/');
			setcookie('userid', $classid, time()+3600, '/');
			echo "<script>location='../index.php';</script>";
		}else{
			echo "<script>alert('登陆失败!');location='../index.php';</script>";
		}
	}
	
 ?>