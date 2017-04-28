<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	$id = $_GET['id'];
	$Deinfo = new Model("Department_info");
	$result = $Deinfo -> field("*") -> where("id={$id}") -> select();
	$total = $Deinfo -> total();
	/*print_r($result);
	exit;*/
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
	<div class="middle_table">
		<div class="info_img">
		</div>
		<h2><img src="./image/ding.jpg"><span>修改学院:</span></h2>
		<hr>
		<div class="add">
			<a href="./tea_xueyuan_all.php">查看院系</a>
		</div>
		<table cellspacing="0" cellpadding="0" width="800px" border="0" class="table_register">
			<form action="./Admin/update_xueyuan.php?id=<?php echo $id; ?>" method="post">
				<tr>
					<td colspan="4"><label><span style="margin-left:11px;font-size:15px;">院系名称：</span><input type="text" name="name" value="<?php echo $result[0]['Dep_name']?>"></label></td>
				</tr>
				<tr>
					<td colspan="4" class="table_register_1"><label><p>院系简介：</p><textarea name="text" resize: none;><?php echo $result[0]['Dep_info']?></textarea></label></td>
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