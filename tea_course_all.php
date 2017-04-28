<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	$Deinfo = new Model("course_info");
	$result = $Deinfo -> field("*") -> select();
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
		<h2><img src="./image/ding.jpg"><span>选课查看:</span></h2>
		<hr>
        <table cellspacing="0" cellpadding="0" width="700px" border="1" class="table_content table_color table_color_center">

            <tr>
            	<th>ID</th>
                <th>课程号</th>
                <th>课程名</th>
                <th>学分</th>
                <th>老师</th>
                <th>上课时间</th>
                <th>限选人数</th>
                <th>已选人数</th>
                <th>删除课程</th>
                <th>修改课程</th>
            </tr>
            <?php for($i = 0; $i < $total; $i++){ ?>
			 <tr>
			 <td><?php echo $result[$i]['id']; ?></td>
			 <td><?php echo $result[$i]['CNO']; ?></td>
			 <td><?php echo $result[$i]['course_name']; ?></td>
			 <td><?php echo $result[$i]['course_cre']; ?></td>
			 <td><?php echo $result[$i]['course_teacher']; ?></td>
			 <td><?php echo $result[$i]['course_time']; ?></td>
			 <td><?php echo $result[$i]['limit_num']; ?></td>
			 <?php 
			 	$couinfo = new Model("select_course");
			 	$couresult = $couinfo -> field("count(id)") -> where("select_course='{$result[$i]['course_name']}'") -> select();
			  ?>
			 <td><?php echo $couresult[0]['count(id)']; ?></td>
			 <td><a href="./Admin/delete_tea_course.php?id=<?php echo $result[$i]['id']; ?> && name=<?php echo $result[$i]['course_name']; ?>" style="margin-left: 6px;">删除</a></td>
			  <td><a href="./update_tea_course.php?id=<?php echo $result[$i]['id']; ?>" style="margin-left: 6px;">修改</a></td>
			 </tr>
			 <?php } ?>
        </table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>