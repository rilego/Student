<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	$Deinfo = new Model("DepartMent_info");
	$result = $Deinfo -> field("*") -> select();
	$total = $Deinfo -> total();
	/*print_r($result);
	exit;
*/ ?>

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
		<h2><img src="./image/ding.jpg"><span>学院信息:</span></h2>
		<hr>
		<table cellspacing="0" cellpadding="0" width="700px" border="0" class="table_content table_color">
		<?php for($i = 0; $i < $total; $i++){ ?>		
	 		<tr>
				<td colspan="1" ><span class="span1"><?php echo $result[$i]['Dep_name']; ?></span></td>
				<td colspan="1" ><a href="./tea_update_xueyuan.php?id=<?php echo $result[0]['id']?>" style="margin-left: 10px;">修改</a></td>
				<td colspan="1" ><a href="./Admin/tea_delete_xueyuan.php?id=<?php echo $result[0]['id']?>" style="margin-left: 10px;">删除</a></td>
			</tr>
			<tr>
				<td colspan="4"><p>院系介绍:</p><span><?php echo $result[$i]['Dep_info']; ?></span></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>