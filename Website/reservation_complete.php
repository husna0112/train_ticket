<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section id="hire">
	<h1>รหัสสำหรับตรวจสอบตั๋ว</h1>
	<?php 
		session_start();
		$randid = $_SESSION["randid"];
		$randpw = $_SESSION["randpw"];
		echo "ID: $randid <br><br>";
		echo "PW: $randpw <br><br>"; 
	?> 
	*Note: Please Take Photo of screen to remember and show check on check page when use the train
</section>
</body>
</html>