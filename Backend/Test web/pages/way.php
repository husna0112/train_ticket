<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		$expire = $_GET["sel"];
		session_start();
 		$_SESSION['expire'] = $expire;
		$startdate = $_SESSION['startdate'];
 	?>
</head>
<body>
	<?php echo "Booking Day: " ,$startdate; ?>
    <br>
 	<?php echo "Expired Day: " ,$expire; ?>
<form action="first.php" method="get">
<select name="sel2">
	<option>กรุง-อรัญ</option>
	<option>อรัญ-กรุง</option>
</select>
<br>
<button>Next</button>
</form>
</body>
</html>