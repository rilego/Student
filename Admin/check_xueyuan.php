<?php 
	header("content-type:text/html;charset=utf8");
	include("config.inc.php");
	include("Model.class.php");

	$name = $_POST['name'];
	$text = $_POST['text'];

	$post = array("Dep_name" => $name,"Dep_info" => $text);

	if(empty($name) || empty($text)){
		echo "<script>alert('不允许为空，请重新输入!');location='../tea_xueyuan.php';</script>";
	}else{
			$user = new Model("DepartMent_info");
			if($user -> insert($post)){
				echo "<script>alert('添加成功!');location='../tea_xueyuan.php';</script>";
			}else{
				error_reporting();
				echo "<script>alert('添加失败!');location='../tea_xueyuan.php';</script>";
			}
		}

 ?>