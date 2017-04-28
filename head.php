<header id="top" style="background: #fff;">
		<span class="logo"></span>
		<h3>计科1403</h3>
		<?php 
			if($_COOKIE['userid']){
				echo "<label style='float:right;margin-right:10%;margin-top:8px;letter-spacing:2px;'><a>欢迎".$_COOKIE['userid'].":".$_COOKIE['username']."</a>|<a href='./Admin/logout.php'>退出</a>|<a href='./edit_user.php'>修改</a></label>";
			}else{
		 ?>
		<span><a href="#" id="example" class="login_color">登陆</a>|<a href="./zhuce.php" id="example" class="login_color">注册</a></span>
		<span class="login"></span>
		<?php } ?>
		<ul class="top_menu">
		<?php 
			if($_COOKIE['userid'] == "学生"){
		 ?>
			<li class="current"><a href="./index.php">首页</a></li>
			<li><a href="./stu_info.php">学生信息</a></li>
			<li><a href="./stu_course.php">选课管理</a></li>
			<li><a href="./stu_xueyuan.php">院系信息</a></li>
			<li><a href="./stu_credit.php">个人成绩</a></li>
			<?php }else{ ?>
			<li class="current"><a href="./index.php">首页</a></li>
			<li><a href="./tea_info.php">学生信息</a></li>
			<li><a href="./tea_course.php">课程添加</a></li>
			<li><a href="./tea_xueyuan.php">院系添加</a></li>
			<li><a href="./tea_grade.php">成绩录入</a></li>
			<?php } ?>
		</ul>
	</header>