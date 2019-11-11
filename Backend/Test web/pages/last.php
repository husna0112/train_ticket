<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	session_start();
	$first = $_GET["sel3"];
	$_SESSION['first'] = $first;
	$station = $_SESSION['station'];
	$expire = $_SESSION['expire'];
	$startdate = $_SESSION['startdate'];
	$way = $_SESSION['way'];
	?>
</head>
<body>
	<p><?php echo 'Booking Date: ', $startdate; ?></p>
 	<p><?php echo 'Expired Date: ', $expire; ?></p>
 	<p><?php echo 'Way Select: ', $way; ?></p>
 	<p><?php echo 'สถานีต้นทาง: ', $first;?></p>
	<form action="time.php" method="get">
 	<p>สถานีปลายทาง:
 	<select name="sel4">
 		<?php
 			$count = 0;
 			foreach ($station as $value){
 				if($count == 1){
 					echo "<option>$value</option>";
 				}
 				if($value == $first){
 					$count = 1;
 				}
 		}
 		?>
 	</select>
 	</p>
 	<br>
	<button>Next</button>
 	</form>
</body>
</html>