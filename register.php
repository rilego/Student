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
		<h2><img src="./image/ding.jpg"><span>注册用户:</span></h2>
		<hr>
		<table cellspacing="0" cellpadding="0" width="800px" border="0" class="table_register">
			<form action="./Admin/check_register.php" method="post">
				<tr>
					<td colspan="3"><label><span>姓名：</span><input type="text" name="username"></label></td>
					<td><label><span>性别：</span><input type="text" name="sex"></label></td>
				</tr>
				<tr>
					<td><label><span>学号：</span><input type="text" name="xuehao"></label></td>
					<td colspan="3"><label><span>出生日期：</span><input type="text" name="birthdate"></label></td>
				</tr>
				<tr>
					<td colspan="4"><label><span>身份证号：</span><input type="text" name="idcard"></label></td>
				</tr>
				<tr>
					<td colspan="3"><label><span>学院：</span><input type="text" name="xueyuan"></label></td>
					<td><label><span>照片：</span><input type="file" name="photo"></label></td>
				</tr>
				<tr>
					<td colspan="4" class="table_register_1"><label><p>个人介绍：</p><textarea name="everyinfo" resize: none;></textarea></label></td>
				</tr>
				<tr>
					<td colspan="4">
						<input type="submit" name="" value="提交" class="button">
					</td>
				</tr>
			</form>
		</table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>