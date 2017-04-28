<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");

	//获取要添加成绩的课程id
	$courseid = $_GET['id'];
	$courseinfo = new Model("select_course");
	$result = $courseinfo -> field("*") -> where("select_course='{$courseid}'") -> select();
	$total = $courseinfo -> field("count(select_course)") -> where("select_course='{$courseid}'") -> group("select_course") -> select();
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
		<h2><img src="./image/ding.jpg"><span>选课查看:</span></h2>
		<hr>
        <table cellspacing="0" cellpadding="0" width="700px" border="1" class="table_content table_color table_color_center">
        <form action="./Admin/insert_credit.php" method="post">
            <tr>
            	<th>ID</th>
                <th>课程号</th>
                <th>课程名</th>
                <th>学生</th>
                <th>成绩</th>
            </tr>
            <?php for($i = 0; $i < $total[0]['count(select_course)']; $i++){ ?>
					 <tr>
					 <td><?php echo $result[$i]['id']; ?></td>
					 <td><?php echo $result[$i]['select_son']; ?></td>
					 <td><?php echo $result[$i]['select_course']; ?></td>
					 <td><?php echo $result[$i]['every_name']; ?></td>
					 <td>
					 	<input type="text" name="credit[]" value="" placeholder="成绩" style="width:50px;margin:0px -17px;">
					 	<input type="hidden" name="hiddenid[]" value="<?php echo $result[$i]['id']; ?>">
					 </td>
					 </tr>
			<?php } ?>
				 	<tr><td colspan="5" style="width:50px;"><input type="submit" name="" value="提交" style="width:50px;background: #73b1e0;border:1px solid;"></td></tr>
			</form>
        </table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>