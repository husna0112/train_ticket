<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php 
		error_reporting(0);
    	$ticket_type = $_POST['type'];
    	$expire_date = $_POST['expire'];
    	$way = $_POST['way'];
    	$first_station = $_POST['first_station'];
    	$last_station = $_POST['last_station'];
    	$time = $_POST['time'];
    	$ticket_amount = $_POST['ticket_amount'];
    	$price = $_POST['price'];
    ?>

    <?php
		$username = "root";
		$password = "";
		$db = "train_proj";
		$conn = new mysqli('localhost', $username, $password, $db) or die("Unable to connect");
		$conn->set_charset("utf8");
	?>
</head>
<body>
	<form method="post">
		<select name="banklist">
			<option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
			<option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
		</select>
		<input type="text" name="acc_num">
		<input type="text" name="acc_pw">
    	<input name="price" value=0></p>
    	<input name='submit' type="submit" value="check"></button>
    	<p id="diff"></p>
	</form>
    <?php
  	if (isset($_POST['submit'])) {
    	$acc_num = $_POST['acc_num'];
   		$acc_pw = $_POST['acc_pw'];
   		$banklist = $_POST['banklist'];
   		$price = $_POST['price'];
   		$sql = "SELECT acc_num, password,bankname,user_money FROM bank_user"; 
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
   			while($row = $result->fetch_assoc()) {
   				if ($acc_num == $row["acc_num"] && $acc_pw == $row["password"] && $banklist == $row["bankname"] && $price <= $row["user_money"]){
   					echo "Yes can pay";
   				}
   				else{
   					echo "NO";
   				}
   			}
		} else {
   			echo "ไม่มีข้อมูล";
		}
		$conn->close();
 	}
	?>
</body>
</html>

<script type="text/javascript">
	var banks = ['A','Z','C'];
</script>