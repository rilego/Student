<?php 
	session_start();
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
		$courseid = $selectcourse -> field("select_course,every_course") -> where("sid={$result[0]['id']}") -> select();
		//取出当前用户的课程总数
		$total = $selectcourse -> field("count(id)") -> where("sid={$result[0]['id']}") -> select();

		$arrse = serialize($courseid);
        $_SESSION['sessarr'] = $arrse;//序列化，对象或者数组都可以这样存放到session中
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
		<h2><img src="./image/ding.jpg"><span>个人成绩:</span></h2>
		<hr>
		<table cellspacing="0" cellpadding="0" width="700px" border="1" class="table_content">
			<tr>
				<td rowspan="3" align="center"><img src="./image/<?php echo $result[0]['photo']?>"><b></b></td>
				<td colspan="2" class="td_height"><span class="span1"><?php echo $result[0]['name']?></span></td>
				<td colspan="1" class="td_height"><a href="./Admin/phpexcel.php?id=<?php echo $result; ?>" style="margin-left: 50px;border: 1px solid #73b1e0; background: #73b1e0;">导出excel</a></td>
			</tr>
			<tr>
				<td class="td_xuehao"><span>学号：<?php echo $result[0]['student_id']?></span></td>
				<td><span>性别：<?php echo $result[0]['sex']?></span></td>
				<td><span>学院：<?php echo $result[0]['in_Department']?></span></td>
			</tr>
		</table>
		<table cellspacing="0" cellpadding="0" width="700px" border="0" class="table_content table_color table_color_center">
            <tr>
                <th>课程名</th>
                <th>分数</th>
            </tr>
             <?php for($i = 0; $i < count($courseid); $i++){ ?>
				 <tr>
				 <td><?php echo $courseid[$i]['select_course']; ?></td>
				 <td><?php echo $courseid[$i]['every_course']; ?></td>
				 </tr>
			 <?php } ?>
        </table>
	</div>
	<!-- 尾部 -->
	<?php include "footer.html";?>
</body>
</html>