<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bulma.min.css">
</head>
<body>
<div class="row" id="space"></div>
<div class="columns">
		<div class="column is-3"></div>
		<div class="column is-6">
			<div class="container">
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <div class="tile is-child box">
	<h1>รหัสสำหรับตรวจสอบตั๋ว</h1>
	<?php 
		session_start();
		$randid = $_SESSION["randid"];
		$randpw = $_SESSION["randpw"];
		echo "ID: $randid <br><br>";
		echo "PW: $randpw <br><br>"; 
	?> 
	*Note: Please Take Photo of screen to remember and show check on check page when use the train
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>