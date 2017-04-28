<?php 
	$cookie = $_COOKIE['username'];

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
		<table cellspacing="0" cellpadding="0" width="150px" border="0" class="table_zhuce">
			<form action="./Admin/check_edituser.php" method="post">
				<tr>
					<td colspan="2"><label><span id="input_span">用户名：</span><input type="text" name="user" value="<?php echo $cookie; ?>" disabled="disabled"></label></td>
				</tr>
				<tr>
					<td colspan="2"><label><span>原密码：</span><input type="text" name="pass"></label></td>
				</tr>
				<tr>
					<td colspan="2"><label><span>新密码：</span><input type="text" name="repass"></label></td>
				</tr>
				<tr class="table_radio">
					<td colspan="1"><label><input type="radio" name="class_id" id="input_xuesheng" value="学生" checked=""><span>学生</span></label>
					</td>
					<td colspan="1"><label><input type="radio" name="class_id" id="input_id" value="教师"><span>教师</span></label>
					</td>
				</tr>
				<tr>
					<td colspan="1">
						<input type="submit" name="" value="提交" class="button">
					</td>
					<td colspan="1">
						<input type="reset" name="" value="重置" class="button">
					</td>
				</tr>
			</form>
		</table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
<script type="text/javascript">
	var inputobj = document.getElementById("input_id");
	var inputxueshengobj = document.getElementById("input_xuesheng");
	inputobj.onclick = function() {
		if(inputobj){
			var inputspanobj = document.getElementById("input_span");
			inputspanobj.textContent = "用户名：";
	 	}
	}
	
	inputxueshengobj.onclick = function() {
		if(inputxueshengobj){
			var inputspanobj = document.getElementById("input_span");
			inputspanobj.textContent = "学号:";
	 	}
	}
</script>
</html>