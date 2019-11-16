<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php 
		session_start();
		error_reporting(0);
    	$ticket_type = $_POST['type'];
    	$_SESSION["ticket_type"] = $ticket_type;
    	$expire_date = $_POST['expire'];
    	$_SESSION["expire_date"] = $expire_date;
    	$way = $_POST['way'];
    	$_SESSION["way"] = $way;
    	$first_station = $_POST['first_station'];
    	$_SESSION["first_station"] = $first_station;
    	$last_station = $_POST['last_station'];
    	$_SESSION["last_station"] = $last_station;
    	$time = $_POST['time'];
    	$_SESSION["time"] = $time;
    	$ticket_amount = $_POST['ticket_amount'];
    	$_SESSION["ticket_amount"] = $ticket_amount;
    	$price = $_POST['price'];
    	$_SESSION["price"] = $price;
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
   		$count = 0;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
  		// output data of each row
   			while($row = $result->fetch_assoc()) {
   				if ($acc_num == $row["acc_num"] && $acc_pw == $row["password"] && $banklist == $row["bankname"] && $price <= $row["user_money"]){
   					echo "Yes can pay Show Pay Button";
   					$count+=1;
   				}
   			}
		} else {
   			echo "ไม่มีข้อมูล";
		}
		if($count == 0){
			echo "No Go Back Button";
		}
		$conn->close();
 	}
	?>
</body>
</html>

<script type="text/javascript">
	var banks = ['A','Z','C'];
</script>