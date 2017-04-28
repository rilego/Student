<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");

	$cookie = $_COOKIE['username'];
	$password = $_POST['pass'];
	$repassword = $_POST['repass'];
	$classid = $_POST['class_id'];

	$user = new Model("user");
	$result = $user -> field("*") -> where("password={$password}") -> select();
	if($result){
		$post = array("password" => $repassword);
		$result1 = $user -> where("username = {$cookie}") -> update($post);
		if($result1){
			echo "<script>alert('修改成功!');location='../index.php';</script>";
		}else{
			echo "<script>alert('修改失败!');location='../edit_user.php';</script>";
		}
	}else{
		echo "<script>alert('您输入的密码不一致，请重新输入!');location='../edit_user.php';</script>";
	}

 ?>