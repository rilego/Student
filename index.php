<?php 
 	$cookie = $_COOKIE['username'];
 	$userid = $_COOKIE['userid'];
 	
	header("content-type:text/html;charset=utf8");
	include("./Admin/config.inc.php");
	include("./Admin/Model.class.php");
	if($userid == "学生"){
		$Deinfo = new Model("student_info");
		$result = $Deinfo -> field("*") -> where("student_id = $cookie") -> select();
		$total = $Deinfo -> total();
	}
	//调出班级成员
	$classpeo = new Model("student_info");
	$people = $classpeo -> field("*") -> select();
	$num = $classpeo -> total();
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
	<section class="banner-1">
	</section>
	<section class="banner-1-1">
		<h1>We are family</h1>
		<p>因梦想，我们相聚长大</p>
		<p>相识、相聚、相恋、相守</p>
		<div class="button">计科1403</div>
	</section>
	<section class="join-us">
		<h2>个人信息展示</h2>
		<hr/>
		<p class="title">
			计科3班的大家庭需要每一个爱生活的人的加入，如果你够年轻，有梦想，有激情，那就不要犹豫，快来加入我们，成为改变所有人生活的人
		</p>
		<div class="vo1-content">
		<div class="vo1-text">
			<h4>计科3班协议</h4>
			<p>加入计科3班的人员必须是一个无比都比的人，因为缺少你我们将缺少欢乐...</p>
			<h4>计科3班协议</h4>
			<p>加入计科3班的人员必须是无私的，把好吃的都要分给舍友，否则值日三年...</p>
			<h4>计科3班协议</h4>
			<p>等等...</p>
		</div>		
		<div class="vo1-form">
			<table cellspacing="0" cellpadding="0" border="0" class="vo1-form-content">
				<tr>
					<td>
						<label><span>姓名:</span><input type="text" name="" value="<?php echo $result[0]['name']?>" disabled="disabled"></label>
					</td>
					<td>
						<label><span>学号:</span><input type="text" name="" value="<?php echo $result[0]['student_id']?>" disabled="disabled"></label>
					</td>
				</tr>
				<tr>
					<td>
						<label><span>出生日期:</span><input type="text" name="" value="<?php echo $result[0]['stu_date']?>" disabled="disabled"></label>
					</td>
					<td>
						<label><span>性别:</span><input type="text" name="" value="<?php echo $result[0]['sex']?>" disabled="disabled"></label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label for="desc"><span>院系:</span><input type="text" name="" value="<?php echo $result[0]['in_Department']?>" disabled="disabled"></label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label for="desc"><span>个人简介:</span><textarea id="desc" disabled="disabled"><?php echo $result[0]['description']?></textarea></label>
					</td>
				</tr>
			</table>
		</div>
		<div class="vo1-content"></div>
	</section>
		
	<section class="person_show">
		<h2>OUR CLASS</h2>
		<div class="person_div">
			<ul class="ul_1">
				<li class="ul_1_1"><img src="./image/<?php echo $people[$num-1]["photo"]?>"><b></b></li>
				<li class="ul_1_2"><span><p><?php echo $people[$num-1]["name"]?>:</p><?php echo $people[$num-1]["description"]?>......</span></li>
			</ul>
			<ul class="ul_2">
				
				<li class="ul_1_1"><span><p><?php echo $people[$num-2]["name"]?>:</p><?php echo $people[$num-2]["description"]?></span></li>
				<li class="ul_1_2"><img src="./image/<?php echo $people[$num-2]["photo"]?>"><b></b></li>
			</ul>
			<ul class="ul_1">
				<li class="ul_1_1"><img src="./image/<?php echo $people[$num-3]["photo"]?>"><b></b></li>
				<li class="ul_1_2"><span><p><?php echo $people[$num-3]["name"]?>:</p><?php echo $people[$num-3]["description"]?></span></li>
			</ul>
			<ul class="ul_3">
				<li class="ul_1_1"><span><p><?php echo $people[$num-4]["name"]?>:</p><?php echo $people[$num-4]["description"]?></span></li>
				<li class="ul_1_2"><img src="./image/<?php echo $people[$num-4]["photo"]?>"><b></b></li>
			</ul>
		</div>
	</section>
	<section class="content-image">
		<div class="content-image-left">
			<p>Who We Are?</p>
		</div>
		<div class="content-image-middle">
			
		</div>
	</section>
	<section class="content-us">
		<h2>联系我们</h2>
		<p>为了更好的与我们大计科3班交流，请联系我们的相关管理人员</p>
		<p>也可以时刻关注我们的动态</p>
		<div class="share">
			<ul>
				<li class="wb"><a href="#"></a></li>
				<li class="fenxiang"><a href="#"></a></li>
				<li class="wx"><a href="#"></a></li>
			</ul>
		</div>
	</section>
	<!-- 底部 -->
	<?php include "footer.html"; ?>
</body>
<script type="text/javascript">
	var topobj = document.getElementById("top");
	window.onscroll = function(){
		//屏幕的总高度
		var winScrollHeight = document.documentElement.scrollHeight;
		//滚动的高度
		var winScrollTop = document.documentElement.scrollTop;
		/*alert(winScrollTop);*/
		if( winScrollTop > 1) {
			/*alert(1);*/
			topobj.style.background = "black";
			topobj.style.color = "red";
		} else {
			topobj.style.background = "#fff";
			topobj.style.color = "black";
		}
	}
</script>
</html>