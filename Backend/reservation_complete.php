<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>รหัสสำหรับตรวจสอบตั๋ว</h1>
	<?php 
		session_start();
		$randid = $_SESSION["randid"];
		$randpw = $_SESSION["randpw"];
		echo "ID: $randid <br><br>";
		echo "PW: $randpw <br><br>"; 
	?> 
	*Note: Please Take Photo of screen to remember and show check on check page when use the train

</body>
</html>