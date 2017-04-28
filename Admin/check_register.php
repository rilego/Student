<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");

	$username = $_POST['username'];
	$sex = $_POST['sex'];
	$xuehao = $_POST['xuehao'];
	$birthdate = $_POST['birthdate'];
	$idcard = $_POST['idcard'];
	$xueyuan = $_POST['xueyuan'];
	$photo = $_POST['photo'];
	$everyinfo = $_POST['everyinfo'];
	$credit ="0";

	$post = array("student_id" => $xuehao, "name" => $username, "sex" => $sex, "stu_date" => $birthdate, "in_Department" => $xueyuan, "Id_card" => $idcard, "photo" => $photo, "description" => $everyinfo, "credit" => $credit );

	if(empty($xuehao) || empty($username) || empty($sex) || empty($birthdate) || empty($xueyuan) || empty($idcard) || empty($photo) || empty($everyinfo) ){
		echo "<script>alert('不允许为空，请重新输入!');location='../register.php';</script>";
	}else{
			$user = new Model("student_info");
			if($user -> insert($post)){
				echo "<script>alert('注册成功!');location='../index.php';</script>";
			}else{
				echo mysql_error();  
				echo "<script>alert('注册失败!');location='../register.php';</script>";
			}
		}
 ?>