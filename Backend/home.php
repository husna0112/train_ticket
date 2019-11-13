<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Online East Train Ticket Booking</h1>
	<h1>ซื้อตั๋วรถไฟสายตะวันออกออนไลน์</h1>
	<form>
		<p>ประเภทตั๋ว: 
			<select id="type">
				<option value="0">กรุณาเลือกประเภทตั๋ว</option>
				<option value="1">1 วัน</option>
				<option value="2">30 วัน</option>
			</select>
		</p>
		<p>วันหมดอายุ: <span id="expdate">-</span>
		<p>เส้นทาง: 
			<select id="way">
				<option value="0">กรุณาเลือกเส้นทาง</option>
				<option value="1">กรุงเทพฯ - อรัญประเทศ</option>
				<option value="2">อรัญประเทศ - กรุงเทพฯ</option>
			</select>
		</p>
		<p id="first">สถานีต้นทาง: 
			<select id="sfirst">
				<option value="0">กรุณาเลือกเส้นทางก่อน!!!</option>
			</select> 
		</p>
		<p id="last">สถานีปลายทาง: 
			<select id="slast">
				<option value="0">กรุณาเลือกสถานีต้นทางก่อน!!!</option>
			</select> 
		</p>
		<p id="time">เวลาเดินทาง: 
			<select id="stime">
				<option value="0">กรุณาเลือกสถานีปลายทางก่อน!!!</option>
			</select>
		</p>
		<p>จำนวนตั๋ว: 
			<input id="amount" type="text">
			<span id="amount_check"></span>
		</p>
		<p>ราคา: 
			<span id="price"></span>
		</p>
		<button>ตกลง</button>
	</form>
</body>

</html>

<!--Javascript-->
<script type="text/javascript">

	var stations = ['A','B','C','D','E','F','G'];

	function expire_date(){
		var today = new Date();
		var expire = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
		var date_check = document.getElementById('type');
    	var date_value = date_check[date_check.selectedIndex].value;
    	if(date_value == 0){
    		var expire = "-"
    	}
    	else if(date_value == 2){
    		var expire = today.setDate(today.getDate()+29);
    		var expire = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    	}
    	var showdate = document.getElementById('expdate');
    	showdate.innerHTML = expire;
	}
	document.getElementById('type').addEventListener('click', expire_date);

	function show_first_station(){
		var way_check = document.getElementById('way');
    	var way_value = way_check[way_check.selectedIndex].value;
    	var sfirst_check = document.getElementById("sfirst");
    	var slast_check = document.getElementById("slast");
    	var stime_check = document.getElementById("stime");
    	if(way_value == 0){
    		/*No Select - First Station*/
    		sfirst_check.remove();
    		sel = document.createElement("select");
    		sel.setAttribute("id", "sfirst");
    		var opt = document.createElement("option");
    		opt.setAttribute("value", 0);
    		opt.innerHTML = "กรุณาเลือกเส้นทางก่อน!!!";
    		sel.appendChild(opt);
    		document.getElementById("first").appendChild(sel);
    		/*No Select - Last Station*/
    		slast_check.remove();
    		sel2 = document.createElement("select");
    		sel2.setAttribute("id", "slast");
    		var opt2 = document.createElement("option");
    		opt2.setAttribute("value", 0);
    		opt2.innerHTML = "กรุณาเลือกสถานีต้นทางก่อน!!!";
    		sel2.appendChild(opt2);
    		document.getElementById("last").appendChild(sel2);
    		/*No Select - Time*/
    		stime_check.remove();
    		sel3 = document.createElement("select");
    		sel3.setAttribute("id", "stime");
    		var opt3 = document.createElement("option");
    		opt3.setAttribute("value", 0);
    		opt3.innerHTML = "กรุณาเลือกสถานีปลายทางก่อน!!!";
    		sel3.appendChild(opt3);
    		document.getElementById("time").appendChild(sel3);
    	}
    	/*First Station Case Show When Click Way*/
    	else if(way_value == 1){
    		stations.sort();
    	}
    	else if(way_value == 2){
    		stations.reverse();
    	}
    	if(way_value > 0){
    		sfirst_check.remove();
    		sel = document.createElement("select");
    		sel.setAttribute("id", "sfirst");
    		for (i=0; i<stations.length+1; i++){
  				var opt = document.createElement("option");
  				sel.appendChild(opt);
  				if(i == 0){
  					opt.setAttribute("value", 0);
  					opt.innerHTML = "กรุณาเลือกสถานีต้นทาง";
  				}
  				else{
  					opt.setAttribute("value", i);
  					opt.innerHTML = stations[i-1];
  				}
  			}
  			document.getElementById("first").appendChild(sel);
    	}
    	document.getElementById('sfirst').addEventListener('click', show_last_station);
	}
	document.getElementById('way').addEventListener('click', show_first_station);

	function show_last_station(){
		var sfirst_check = document.getElementById("sfirst");
    	var sfirst_value = sfirst_check[sfirst_check.selectedIndex].value;
    	var slast_check = document.getElementById("slast");
    	var stime_check = document.getElementById("stime");
    	if(sfirst_value == 0){
    		//No Selection - Last Station
    		slast_check.remove();
    		sel1 = document.createElement("select");
    		sel1.setAttribute("id", "slast");
    		var opt1 = document.createElement("option");
    		opt1.setAttribute("value", 0);
    		opt1.innerHTML = "กรุณาเลือกสถานีต้นทางก่อน!!!";
    		sel1.appendChild(opt1);
    		document.getElementById("last").appendChild(sel1);
    		//No Selection - Time
    		stime_check.remove();
    		sel2 = document.createElement("select");
    		sel2.setAttribute("id", "stime");
    		var opt2 = document.createElement("option");
    		opt2.setAttribute("value", 0);
    		opt2.innerHTML = "กรุณาเลือกสถานีปลายทางก่อน!!!";
    		sel2.appendChild(opt2);
    		document.getElementById("time").appendChild(sel2);
    	}
    	else if(sfirst_value == stations.length){
    		slast_check.remove();
    		sel1 = document.createElement("select");
    		sel1.setAttribute("id", "slast");
  			var opt1 = document.createElement("option");
  			opt1.setAttribute("value", 0);
  			opt1.innerHTML = "ไม่มีเส้นทางการเดินทางแล้ว!!!";	
  			sel1.appendChild(opt1);
  			document.getElementById("last").appendChild(sel1);
  		}
    	else{
    		slast_check.remove();
    		sel1 = document.createElement("select");
    		sel1.setAttribute("id", "slast");
    		var opt = document.createElement("option");
    		opt.setAttribute("value", i);
    		opt.innerHTML = "กรุณาเลือกสถานีปลายทาง";
    		sel1.appendChild(opt);
    		for (i=sfirst_value; i<stations.length; i++){
    			var opt = document.createElement("option");
    			opt.setAttribute("value", i);
    			opt.innerHTML = stations[i];
  				sel1.appendChild(opt);
  				document.getElementById("last").appendChild(sel1);
    		}
    	}
	}

</script>