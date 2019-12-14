<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>แสดงการจองตั๋วรภไฟ</title>
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
	<img src="img/logo.png" alt="Logo" height="200" width="200">
</div>
							<h1 class="sc-main-title">รายละเอียดตั๋ว</h1>
							<?php
   		$sql = "SELECT * FROM booking_log"; 
   		session_start();
		$result = $conn->query($sql);
		$randid = $_SESSION['randid'];
		$randpw = $_SESSION['randpw'];
		if ($result->num_rows > 0) {
  		// output data of each row
   			while($row = $result->fetch_assoc()) {
   				if($randid == $row['rand_id'] && $randpw == $row['rand_pw']){
   					$rowid = $row['id'];
   					$rowtype = $row['ticket_type'];
   					$rowexp = $row['expdate'];
   					$rowway = $row['way'];
   					$rowf = $row['first_station'];
   					$rowl = $row['last_station'];
   					$rowtime = $row['timentrain'];
   					$rowamount = $row['ticket_amount'];
   					$rowprice = $row['price'];
   					echo "<h2>#$rowid</h2>";
   					echo "ประเภทตั๋ว: $rowtype<br><br>
   						  วันหมดอายุ: $rowexp<br><br>
   						  เส้นทาง: $rowway<br><br>
   						  สถานีต้นทาง: $rowf<br><br>
   						  สถานีปลายทาง $rowl<br><br>
   						  ขบวนรถไฟ และ เวลาเดินทาง: $rowtime<br><br>
   						  จำนวนตั๋วที่ซื้อ: $rowamount ใบ<br><br>
   						  ราคาตั๋วทั้งหมด: $rowprice บาท<br><br>";
   				}
   			}
		} else {
   			echo "ไม่มีข้อมูล";
		}
 		$conn->close();
	?>
	<div class="imglogo">
	<form action="index.php">
                    <button class="button button3">กลับสู่หน้าหลัก</button>
				</form>
	</div>
						</div>
					</div>

</body>

</html>