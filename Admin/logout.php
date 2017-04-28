<?php 
	/*
		*作用：退出登陆文件
	*/

	setcookie('username', '', time()-1, '/');
	setcookie('userid', '', time()-1, '/');
	echo "<script>location='../index.php'</script>";
 ?>