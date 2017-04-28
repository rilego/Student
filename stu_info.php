<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");

	$cookie = $_COOKIE['username'];
	$Deinfo = new Model("student_info");

	$result = $Deinfo -> field("*") ->where("student_id='{$cookie}'") -> select();
	$total = $Deinfo -> total();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>学生成绩管理系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="./css/loginDialog.css" />
</head>
<body>
	<!-- 头部 -->
	<?php include "head.php";?>
	<!-- 中间部分 -->
	<div class="middle_table">
		<div class="info_img">
		</div>
		<h2><img src="./image/ding.jpg"><span>个人信息:</span></h2>
		<hr>
		<table cellspacing="0" cellpadding="0" width="700px" border="0" class="table_content">
			<tr>
				<td rowspan="3" align="center"><img src="./image/<?php echo $result[0]['photo']; ?>"><b></b></td>
				<td colspan="3" class="td_height"><span class="span1"><?php echo $result[0]['name']; ?></span><a href="./stu_edit.php?id=<?php echo $result[0]['id'];?>">修改</a></td>
			</tr>
			<tr>
				<td class="td_xuehao"><span>学号：<?php echo $result[0]['student_id']; ?></span></td>
				<td><span>性别：<?php echo $result[0]['sex']; ?></span></td>
				<td><span><?php echo $result[0]['stu_date']; ?></span></td>
			</tr>
			<tr>
				<td colspan="3"><span>身份证号：<?php echo $result[0]['Id_card']; ?></span></td>
			</tr>
			<tr>
				<td></td>
				<td class="xueyuan"><span>学院：<?php echo $result[0]['in_Department']; ?></span></td>
				<td colspan="2"><span>学分：<?php echo $result[0]['credit']; ?></span></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="4"><span><p style="color: #fff;background: #5cafa5;width:90px;">个人介绍:</p>&nbsp;&nbsp;<?php echo $result[0]['description']; ?></span></td>
			</tr>
		</table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>