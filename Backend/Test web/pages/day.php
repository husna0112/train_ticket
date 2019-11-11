<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Choose Booking Type</title>
	<?php
		session_start();
		date_default_timezone_set("Asia/Bangkok");
		$startdate = strtotime(date("Y-m-d"));
		$monthdate = date("Y-m-d", strtotime("+29 days", $startdate));
		$_SESSION['monthdate'] = $monthdate;
		$startdate = date("Y-m-d");
		$_SESSION['startdate'] = $startdate;
	?>
</head>
<body>
	<h1>เลือกรูปแบบการซื้อตั๋วรถไฟ</h1>
	<form action="way.php" method="get">
		<select name="sel">
			<option value="<?php echo $startdate ?>">วันนี้</option>
			<option value="<?php echo $monthdate ?>">30 วัน</option>
		</select>
		<br><br>
		<button>Next</button>
	</form>
</body>
</html>