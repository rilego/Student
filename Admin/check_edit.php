<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");
	$id = $_POST['id'];
	$username = $_POST['username'];
	$sex = $_POST['sex'];
	$xuehao = $_POST['xuehao'];
	$birthdate = $_POST['birthdate'];
	$idcard = $_POST['idcard'];
	$xueyuan = $_POST['xueyuan'];
	$photo = $_POST['photo'];
	$everyinfo = $_POST['everyinfo'];

	if(!$photo){
		$post = array("student_id" => $xuehao, "name" => $username, "sex" => $sex, "stu_date" => $birthdate, "in_Department" => $xueyuan, "Id_card" => $idcard, "description" => $everyinfo);
	}else{
		$post = array("student_id" => $xuehao, "name" => $username, "sex" => $sex, "stu_date" => $birthdate, "in_Department" => $xueyuan, "photo" => $photo, "Id_card" => $idcard, "description" => $everyinfo);
	}

	if(empty($xuehao) || empty($username) || empty($sex) || empty($birthdate) || empty($xueyuan) || empty($idcard) || empty($everyinfo) ){
		echo "<script>alert('不允许为空，请重新输入!');location='../register.php';</script>";
	}else{
			$user = new Model("student_info");
			if($user -> where("id=$id") -> update($post)){
				echo "<script>alert('修改成功!');location='../stu_info.php';</script>";
			}else{
				echo mysql_error();  
				echo "<script>alert('修改失败!');location='../register.php';</script>";
			}
		}
		
 ?>