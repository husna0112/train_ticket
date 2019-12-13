<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ตรวจสอบตั๋ว</title>
	<link rel="stylesheet" type="text/css" href="css/reserve.css">
	<?php
		$username = "root";
		$password = "";
		$db = "train_proj";
		$conn = new mysqli('localhost', $username, $password, $db) or die("Unable to connect");
		$conn->set_charset("utf8");
	?>
</head>

<body>
<div class="sc-box">
    <div class="sc-container">
	<div class="imglogo">
	<img src="img/logo.png" alt="Logo" height="100" width="100">
</div>
		<h1 class="sc-main-title">ตรวจตั๋ว</h1>
		<form method="post">
			<p>ID: <input class="input" type="text" name="randid"></p>
			<p>PASSWORD: <input class="input" type="password" name="randpw"></p><br>
			<div class="imglogo">
			<input type="submit" name="submit" value="ตรวจสอบ">
</div>
		</form>
</div>
</div>
	<?php
if (isset($_POST['submit'])) {
		session_start();
		$count = 0;
		$randid = $_POST['randid'];
		$_SESSION['randid'] = $randid;
		$randpw = $_POST['randpw'];
		$_SESSION['randpw'] = $randpw;
   		$sql = "SELECT rand_id, rand_pw FROM booking_log"; 
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
   			while($row = $result->fetch_assoc()) {
   				if ($randid == $row["rand_id"] && $randpw == $row["rand_pw"]){
   					$count = 1;
   					header('Location: show_reservation.php');
   				}
   			}
		} else {
   			echo "ไม่มีข้อมูล";
		}
		if($count == 0){
			echo "ข้อมูลผิดพลาด กรุณาตรวจสอบและลองอีกครั้ง";
		}
 	}
 	$conn->close();
?>
</body>

</html>