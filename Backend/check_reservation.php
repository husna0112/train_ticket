<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		$username = "root";
		$password = "";
		$db = "train_proj";
		$conn = new mysqli('localhost', $username, $password, $db) or die("Unable to connect");
		$conn->set_charset("utf8");
	?>
</head>
<body>
<h1>ตรวจตั๋ว</h1>
<form method="post">
	ID: <input type="text" name="randid"><br><br>
	PW:	<input type="password" name="randpw"><br><br>
	<input type="submit" name="submit" value="ตรวจสอบ">
</form>

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