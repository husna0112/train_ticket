<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/reserve.css">
</head>
<body>
<div class="sc-box">
    <div class="sc-container">
	<div class="imglogo">
	<img src="img/logo.png" alt="Logo" height="100" width="100">
</div>
	<h1 class="sc-main-title">รหัสสำหรับตรวจสอบตั๋ว</h1>
	<?php 
		session_start();
		$randid = $_SESSION["randid"];
		$randpw = $_SESSION["randpw"];
		echo "ID: $randid <br><br>";
		echo "PW: $randpw <br><br>"; 
	?> 
	*Note: Please Take Photo of screen to remember and show check on check page when use the train
</div>
</div>
</body>
</html>