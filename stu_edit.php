<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	$id = $_GET['id'];
	$Deinfo = new Model("student_info");
	$result = $Deinfo -> field("*") -> where("id={$id}") -> select();
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
		<h2><img src="./image/ding.jpg"><span>修改用户:</span></h2>
		<hr>
		<table cellspacing="0" cellpadding="0" width="800px" border="0" class="table_register">
			<form action="./Admin/check_edit.php" method="post">
				<tr>
					<td colspan="2"><label><span>姓名：</span><input type="text" name="username" value='<?php echo $result[0]['name']; ?>'></label></td>
					<td colspan="2"><label><span>性别：</span><input type="text" name="sex" value='<?php echo $result[0]['sex']; ?>'></label></td>
				</tr>
				<tr>
					<td><label><span>学号：</span><input type="text" name="xuehao" value='<?php echo $result[0]['student_id']; ?>'></label></td>
					<td colspan="3"><label><span>出生日期：</span><input type="text" name="birthdate" value='<?php echo $result[0]['stu_date']; ?>'></label></td>
				</tr>
				<tr>
					<td colspan="2"><label><span>身份证号：</span><input type="text" name="idcard" value='<?php echo $result[0]['Id_card']; ?>'></label></td>
					<td rowspan="2"><span style="margin:10px 110px;"><img src="./image/<?php echo $result[0]['photo']; ?>"><input type="file" style="float:right;" name="photo" value="<?php echo $result[0]['photo']; ?>"></span></td>
				</tr>
				<tr>
					<td colspan="2"><label><span>学院：</span><input type="text" name="xueyuan" value='<?php echo $result[0]['in_Department']; ?>'></label>
					</td>
				</tr>
				<tr>
					<td colspan="4" class="table_register_1"><label><p>个人介绍：</p><textarea name="everyinfo" value='<?php echo $result[0]['description']; ?>'><?php echo $result[0]['description']; ?></textarea></label></td>
				</tr>
				<tr>
					<td colspan="4">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="" value="修改" class="button">
					</td>
				</tr>
			</form>
		</table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>