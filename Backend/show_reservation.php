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
	<h1>รายละเอียดตั๋ว</h1>
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
   					$rowtype = $row['ticket_type'];
   					$rowexp = $row['expdate'];
   					$rowway = $row['way'];
   					$rowf = $row['first_station'];
   					$rowl = $row['last_station'];
   					$rowtime = $row['timentrain'];
   					$rowamount = $row['ticket_amount'];
   					$rowprice = $row['price'];
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
	<p>การเข้าสู่หน้านี้ได้แสดงว่าตั๋วนี้ได้รับการซื้อมาอย่างถูกต้อง</p>
	<p>Watermarks</p>
</body>
</html>