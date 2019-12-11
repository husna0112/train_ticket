<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		$username = "root";
		$password = "";
		$db = "train_proj";
		$conn = new mysqli('localhost', $username, $password, $db) or die("Unable to connect");
		$conn->set_charset("utf8");
	?>
</head>

<body>
	<section id="hire">
		<h1 class="title">ตรวจตั๋ว</h1>
		<form method="post">
			<p>ID: <input class="input" type="text" name="randid"></p>
			<p>PW: <input class="input" type="password" name="randpw"></p><br>
			<input type="submit" name="submit" value="ตรวจสอบ">
		</form>
	</section>
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