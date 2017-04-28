<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	$Deinfo = new Model("student_info");
	$result = $Deinfo -> field("*") -> select();
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
	<div class="stu_table">
		<div class="info_img">
		</div>
		<h2><img src="./image/ding.jpg"><span>个人信息:</span></h2>
		<hr>
		<div class="add">
			<a href="./register.php">添加学生</a>
		</div>
		<table cellspacing="0" cellpadding="0" width="700px" border="0" class="table_content">
		<?php for($i = 0; $i < $total; $i++){ ?>
			<tr>
				<td rowspan="3" align="center"><img src="./image/<?php echo $result[$i]['photo']; ?>"><b></b></td>
				<td colspan="1" class="td_height"><span class="span1"><?php echo $result[$i]['name']; ?></span></td>
				<td colspan="2"><span>学院：<?php echo $result[$i]['in_Department']; ?></span></td>
			</tr>
			<tr>
				<td class="td_xuehao"><span>学号：<?php echo $result[$i]['student_id']; ?></span></td>
				<td><span>性别：<?php echo $result[$i]['sex']; ?></span></td>
				<td><span><?php echo $result[$i]['stu_date']; ?></span></td>
			</tr>
			<tr>
				<td colspan="2"><span>身份证号：<?php echo $result[$i]['Id_card']; ?></span></td>
				<td colspan="1"><span>学分：<?php echo $result[$i]['credit']; ?></span></td>
			</tr>
			<tr>
				<td><a href="./Admin/delete_student.php?id=<?php echo $result[$i]['student_id']; ?>" style="margin-left:60px;">删除</a></td>
				<td colspan="4"><span><p>个人介绍:</p>&nbsp;&nbsp;<?php echo $result[$i]['description']; ?></span></td>
			</tr>
			<?php } ?>
		</table>
		<hr class="hr">
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>