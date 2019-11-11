<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		session_start();
 		$expire = $_SESSION['expire'];
		$startdate = $_SESSION['startdate'];
		$way = $_GET["sel2"];
		$_SESSION['way'] = $way;
		$station = ['A', 'B', 'C', 'D', 'E']; 
 	?>
</head>
<body>
	<p><?php echo "Booking Day: " ,$startdate; ?></p>
 	<p><?php echo "Expired Day: " ,$expire; ?></p>
 	<p><?php echo "Way Select: " ,$way; ?></p>
 	<form action="last.php" method="get">
 	<p>สถานีต้นทาง:
 	<select name="sel3">
 		<?php
 		if ($way == 'อรัญ-กรุง'){
 			arsort($station);
 		}
 		else if($way == 'กรุง-อรัญ'){
 			asort($station);	
 		}
 		$_SESSION['station'] = $station;
 		foreach ($station as $value){
 			echo "<option>$value</option>";
 		}
 		?>
 	</select>
 	</p>
 	<br>
	<button>Next</button>
 	</form>
</body>
</html>