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
		session_start();
		$ticket_type = $_POST["type"]; 
		$_SESSION["type"] = $ticket_type;
		$expire_date = $_POST["expire"];
		$_SESSION["expire"] = $expire_date;
		$way = $_POST["way"];
		$_SESSION["way"] = $way;
		$first_station = $_POST["first_station"];
		$_SESSION["first_station"] = $first_station;
		$last_station = $_POST["last_station"];
		$_SESSION["last_station"] = $last_station;
		$time = $_POST["time"];
		$_SESSION["time"] = $time;
		$ticket_amount = $_POST["ticket_amount"];
		$_SESSION["ticket_amount"] = $ticket_amount;
		$price = $_POST["price"];
		$_SESSION["price"] = $price;

		$ticket_type = $_SESSION["type"]; 
		$expire_date = $_SESSION["expire"];
		$way = $_SESSION["way"];
		$first_station = $_SESSION["first_station"];
		$last_station = $_SESSION["last_station"];
		$time = $_SESSION["time"];
		$ticket_amount = $_SESSION["ticket_amount"];
		$price = $_SESSION["price"];
	?>
</head>

<body>

	<section id="hire">
		<h1 class="title">โอนเงินผ่านบัญชีธนาคาร</h1>
		<form method="post">
		<p>ธนาคาร: <select name="banklist"></p>
			<option value=0>กรุณาเลือกธนาคาร</option>
			<option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
			<option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
			<option value="ธนาคารกสิกรไทย">ธนาคารกรุงเทพ</option>
			<option value="ธนาคารกสิกรไทย">ธนาคารกรุงไทย</option>
			<option value="ธนาคารกสิกรไทย">ธนาคารธนชาต</option>
			<option value="ธนาคารกสิกรไทย">ธนาคารกรุงศรีอยุธยา</option>
			<option value="ธนาคารกสิกรไทย">ธนาคารUOB</option>
		</select>
		<br><br>
		<p>เลขบัญชี: <input class="input" type="text" name="acc_num"></p>
		<p>รหัสผ่าน: <input class="input" type="password" name="acc_pw"></p><br>
		<span style="display: none;">
			<input name='type' value='<?php echo $ticket_type?>'>
			<input name='expire' value='<?php echo $expire_date ?>'>
			<input name='way' value='<?php echo $way ?>'>
			<input name='first_station' value='<?php echo $first_station ?>'>
			<input name='last_station' value='<?php echo $last_station ?>'>
			<input name='time' value='<?php echo $time ?>'>
			<input name='ticket_amount' value='<?php echo $ticket_amount ?>'>
			<input name='price' value='<?php echo $price ?>'>
		</span>
		<input name='submit' type='submit' value='ตรวจสอบ'>
	</form>

</section>

	
    <?php
  	if (isset($_POST['submit'])) {
  		$acc_num = $_POST['acc_num'];
  		$acc_pw = $_POST['acc_pw'];
  		$banklist = $_POST['banklist'];
   		$sql = "SELECT id, acc_num, password,bankname,user_money FROM bank_user"; 
   		$count = 0;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
   			while($row = $result->fetch_assoc()) {
   				if ($acc_num == $row["acc_num"] && $acc_pw == $row["password"] && $banklist == $row["bankname"] && $price <= $row["user_money"]){
   					function generateRandomString($length = 10) {
    					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    					$charactersLength = strlen($characters);
    					$randomString = '';
    					for ($i = 0; $i < $length; $i++) {
        					$randomString .= $characters[rand(0, $charactersLength - 1)];
    					}
    					return $randomString;
					}
					$randid = generateRandomString(6);
					$_SESSION["randid"] = $randid;
					$randpw = generateRandomString(4);
					$_SESSION["randpw"] = $randpw;
					$mymoney = $row["user_money"];
					$ans = $mymoney - $price;
					$_SESSION["ans"] = $ans;
					$userid = $row["id"];
					$_SESSION["userid"] = $userid;
					echo "
						  <section>
						  <p>เงินในบัญชี: $mymoney </p>
    					  <p>ราคาที่ต้องจ่าย: $price </p>
    					  <p>ยอดเงินคงเหลือ: $ans </p>
    					  <form method='post'> สามารถชำระเงินได้<br><br>
   							กรุณากดปุ่ม <input name='save' type='submit' method='post' value='ตกลง'>
   																<span style='display: none;'>
   																	<input name='type' value='$ticket_type'>
    																<input name='expire' value='$expire_date'>
    																<input name='way' value='$way'>
    																<input name='first_station' value='$first_station'>
    																<input name='last_station' value='$last_station'>
    																<input name='time' value='$time'>
    																<input name='ticket_amount' value='$ticket_amount'>
    																<input name='price' value='$price'>
    															</span> เพื่อยืนยันการซื้อตั๋ว</form></section>";
   					$count = 1;
   				}
   			}
		} else {
   			echo "<section> ไม่มีข้อมูล </section>";
		}
		if($count == 0){
			echo "<section> ไม่สามารถชำระเงินได้ กรุณาตรวจสอบและลองอีกครั้ง </section>";
		}
 	}
 	if (isset($_POST['save'])) {
 		$randid = $_SESSION['randid'];
 		$randpw = $_SESSION['randpw'];
 		$userid = $_SESSION['userid'];
 		$ans = $_SESSION['ans'];
 		echo $_SESSION['randpw'];
 		echo $_SESSION['expire'];
 		$sqlud = "UPDATE bank_user SET user_money=$ans WHERE id=$userid";
    	$sql = 'INSERT INTO booking_log (rand_id, rand_pw, ticket_type, expdate, way, first_station, last_station, timentrain, ticket_amount, price)
		VALUES ("'.$randid.'", "'.$randpw.'", "'.$ticket_type.'", "'.$expire_date.'", "'.$way.'", "'.$first_station.'", "'.$last_station.'", "'.$time.'", "'.$ticket_amount.'", "'.$price.'")';
		if ($conn->query($sql) === TRUE and $conn->query($sqlud) === TRUE) {
    		echo "New record created successfully";
    		header('Location: reservation_complete.php');
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
 	$conn->close();
	?>
</body>
</html>