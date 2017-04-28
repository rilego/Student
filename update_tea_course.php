<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	$id = $_GET['id'];
	$Deinfo = new Model("course_info");
	$result = $Deinfo -> field("*") -> where("id={$id}") -> select();
	$total = $Deinfo -> total();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>学生成绩管理系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/stu_model.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="./css/loginDialog.css" />
</head>
<body>
	<!-- 头部 -->
	<?php include "head.php";?>
	<!-- 中间部分 -->
	<div class="stu_course">
		<div class="info_img">
		</div>
		<h2><img src="./image/ding.jpg"><span>课程添加:</span></h2>
		<hr>
		<div class="add">
			<a href="./tea_course_all.php">查看课程</a>
		</div>
		<table cellspacing="0" cellpadding="0" width="800px" border="0" class="stu_course_table">
			<form action="./Admin/update_course.php?id=<?php echo $id; ?>" method="post">
				<tr>
					<td colspan="3"><label><span>课程名称：</span><input type="text" name="coursename" value="<?php echo $result[0]['course_name']; ?>"></label></td>
					<td><label><span>课程号：</span><input type="text" name="courseinfo" value="<?php echo $result[0]['CNO']; ?>"></label></td>
				</tr>
				<tr>
					<td><label><span>学分：</span><input type="text" name="credit" value="<?php echo $result[0]['course_cre']; ?>"></label></td>
					<td colspan="3"><label><span>上课时间：</span><input type="text" name="classtime" value="<?php echo $result[0]['course_time']; ?>"></label></td>
				</tr>
				<tr>
					<td colspan="2"><label><span>任课教师：</span><input type="text" name="teacher" value="<?php echo $result[0]['course_teacher']; ?>"></label></td>
					<td colspan="2"><label><span>限选人数：</span><input type="text" name="limitpeople" value="<?php echo $result[0]['limit_num']; ?>"></label></td>
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