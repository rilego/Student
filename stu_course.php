<?php 
	if(!$_COOKIE['userid']){
		echo "<script>alert('请登录!');location='index.php'</script>";
	}
	
 	$cookie = $_COOKIE['username'];

	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	if($cookie){
		$Deinfo = new Model("student_info");
		$result = $Deinfo -> field("*") -> where("student_id = $cookie") -> select();
		//根据登陆用户的id调用出他所选择的课程名称和id号
		$selectcourse = new Model("select_course");
		$courseid = $selectcourse -> field("*") -> where("sid={$result[0]['id']}") -> select();
		//取出当前用户的课程总数
		$total = $selectcourse -> field("count(id)") -> where("sid={$result[0]['id']}") -> select();
	}

	
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
		<table cellspacing="0" cellpadding="0" width="700px" border="0" class="table_content">
			<tr>
				<td colspan="3" class=""><span class="span1"><?php echo $result[0]['name']?></span></td>
			</tr>
			<tr>
				<td class="td_xuehao"><span>学号：<?php echo $result[0]['student_id']?></span></td>
				<td><span>性别：<?php echo $result[0]['sex']?></span></td>
				<td><span>学院：<?php echo $result[0]['in_Department']?></span></td>
			</tr>
			<tr>
				<td colspan="3"><span>学分：<?php echo $result[0]['credit']?></span></td>
			</tr>
			<tr>
				<td><span>已选课程：</span></td>
				<td><span>(<a href="./stu_course_all.php" style="margin-left:0px;">查看所有课程</a>)</span></td>
				<td colspan="2"></td>
			</tr>
		</table>
        <table cellspacing="0" cellpadding="0" width="700px" border="1" class="table_content table_color table_color_center">
            <tr>
                <th>课程号</th>
                <th>课程名</th>
                <th>学分</th>
                <th>老师</th>
                <th>上课时间</th>
                <th>删除</th>
            </tr>
			<?php for($i = 0; $i < $total[0]['count(id)']; $i++){ ?>
				 <tr>
				 <td><?php echo $courseid[$i]['select_son']; ?></td>
				 <td><?php echo $courseid[$i]['select_course']; ?></td>
				 <td><?php echo $courseid[$i]['select_credit']; ?></td>
				 <td><?php echo $courseid[$i]['select_teacher']; ?></td>
				 <td><?php echo $courseid[$i]['select_time']; ?></td>
				 <td><a href="./Admin/delete_course.php?id=<?php echo $courseid[$i]['id']; ?>" style="margin-left: 0px;">删除</a></td>
				 </tr>
			 <?php } ?>
        </table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>