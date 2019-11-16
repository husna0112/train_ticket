<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
    	$ticket_type = $_POST['type'];
    	$expire_date = $_POST['expire'];
    	$way = $_POST['way'];
    	$first_station = $_POST['first_station'];
    	$last_station = $_POST['last_station'];
    	$time = $_POST['time'];
    	$ticket_amount = $_POST['ticket_amount'];
    	$price = $_POST['price'];
    ?>
    choose banks from lists
    type your account number
    type your password
    check from bank db table that your bankname id pw is correct or not
    if correct show money in deposit
    and price to pay
    and benefit(suan tang)
    show button accept if money deposit >= payprice to save data in db log table with random generate id pw
</body>
</html>