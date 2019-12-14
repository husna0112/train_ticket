<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>จองตั๋วสำเร็จ</title>
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
	*Note: กรุณาถ่ายภาพหน้าจอของหน้านี้ไว้เพื่อให้ท่านสามารถเข้าสู่หน้าตรวจสอบตั๋วเพื่อตรวจสอบตั๋วได้เมื่อใช้งานรถไฟ
	<br>
	<div class="imglogo">
	<form action="index.php">
                    <button class="button button3">กลับสู่หน้าหลัก</button>
				</form>
	</div>
</div>
</div>
</body>
</html>