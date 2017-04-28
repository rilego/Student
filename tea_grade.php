<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	$courseinfo = new Model("select_course");
	$result = $courseinfo -> field("*") -> group("select_course desc") -> select();
	$sql = "select count(t.counts) from (select select_course,count(*) counts from select_course group by select_course) t";
	$rst = mysql_query($sql);
	$total = mysql_fetch_assoc($rst);
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
            <tr>
            	<th>ID</th>
                <th>课程号</th>
                <th>课程名</th>
                <th>学分</th>
                <th>老师</th>
                <th>录入分数</th>
            </tr>
            <?php for($i = 0; $i < $total['count(t.counts)']; $i++){ ?>
				 <tr>
				 <td><?php echo $result[$i]['id']; ?></td>
				 <td><?php echo $result[$i]['select_son']; ?></td>
				 <td><?php echo $result[$i]['select_course']; ?></td>
				 <td><?php echo $result[$i]['select_credit']; ?></td>
				 <td><?php echo $result[$i]['select_teacher']; ?></td>
				 <td><a href="./course_every.php?id=<?php echo $result[$i]['select_course']; ?>" style="margin-left:0px;">录分</a></td>
				 </tr>
			 <?php } ?>
        </table>	
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>