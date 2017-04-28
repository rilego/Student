<html xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns="http://www.w3.org/TR/REC-html40">

 <html>
     <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
         <style id="Classeur1_16681_Styles"></style>
     </head>

<?php 
	session_start();
	header("content-type:text/html;charset=utf-8;");
	include("./config.inc.php");
	include("./Model.class.php");

	$courseid = unserialize($_SESSION['sessarr']);//反序列化

	header("Content-type:application/vnd.ms-excel"); 
	header("Content-Disposition:filename=test.xls"); 

	foreach($courseid as $key => $val){
		echo "&nbsp;";
		foreach($val as $k => $v) {
			echo $v."\t";

		}
		echo "<br>";
	}

 ?>

 </html>
