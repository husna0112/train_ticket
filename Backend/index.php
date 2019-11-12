<!DOCTYPE html>
<html>
	<head>
		<title>Online East Train Ticket Booking</title>
		<meta charset="utf-8">
	</head>

	<body>
		<h1>Online East Train Ticket Booking</h1>
		<h1>ซื้อตั๋วรถไฟสายตะวันออกออนไลน์</h1>
		<p>Ticket:
			<select id="ticket">
				<option value="0">เลือกประเภทตั๋ว</option>
				<option value="1">วันนี้</option>
				<option value="2">30 วัน</option>
			</select> 
		</p>
		<p>วันหมดอายุ: <span id="expired"> - </span> </p>
		<p>เส้นทาง:
			<select id="way">
				<option>กรุณาเลือกเส้นทาง</option>
				<option value="1">กรุงเทพ-อรัญประเทศ</option>
				<option value="2">อรัญประเทศ-กรุงเทพ</option>
			</select>
		</p>
		<p id='firstp'>สถานีต้นทาง:
			<select id="first">
				<option value="0">กรุณาเลือกเส้นทางก่อน!!!</option>
			</select> 
		</p>
		<p id='lastp'>สถานีปลายทาง:
			<select id="last">
				<option value="0">กรุณาเลือกสถานีต้นทางก่อน!!!</option>
			</select> 
		</p>
		<p id='inittime'>เวลาเริ่มเดินทาง</p>
		<p id='finish'>เวลาถึงที่หมาย</p>
		<p id='tname'>ชื่อขบวนรถไฟ</p>
	</body>
</html>

<script type="text/javascript">
	var stations = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
			function show_selected() {
    			var selector = document.getElementById('way');
    			var value = selector[selector.selectedIndex].value;
    			var ele = document.getElementById("first");
    			var sel = document.createElement("select");
    			var sel2 = document.createElement("select");
    			var opt = document.createElement("option");
    			var lasta = document.getElementById("last");
    			lasta.remove();
    			sel2.setAttribute("id", "last");
    			document.getElementById("lastp").appendChild(sel2);
    			var opt = document.createElement("option");
  				sel2.appendChild(opt);
    			opt.innerHTML = "กรุณาเลือกสถานีต้นทางก่อน!!!";
    			if(value == '1'){
    				stations.sort();
    				ele.remove();
    				sel.setAttribute("id", "first");
    				document.getElementById("firstp").appendChild(sel);
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
    			}
    			else if(value == '2'){
    				stations.reverse();
    				ele.remove();
    				sel.setAttribute("id", "first");
    				document.getElementById("firstp").appendChild(sel);
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
    			}
    			else{
    				ele.remove();
    				sel.setAttribute("id", "first");
    				document.getElementById("firstp").appendChild(sel);
    				var opt = document.createElement("option");
  					sel.appendChild(opt);
  					opt.innerHTML = "กรุณาเลือกเส้นทางก่อน!!!";
    			}
    			document.getElementById('first').addEventListener('click', two_selected);
			}

			function two_selected(){
					var lasta = document.getElementById("last");
					var sel = document.createElement("select");
					var selector = document.getElementById('first');
    				var value = selector[selector.selectedIndex].value;
				  	lasta.remove();
  					sel.setAttribute("id", "last");
  					document.getElementById("lastp").appendChild(sel);
  					if(value == stations.length){
  						var opt = document.createElement("option");
  						sel.appendChild(opt);
  						opt.innerHTML = "ไม่มีเส้นทางการเดินทางแล้ว!!!";	
  					}
  					else{
  						for (i=0; i<stations.length+1; i++){
  							if(value == '0'){
  								var opt = document.createElement("option");
  								sel.appendChild(opt);
  								opt.innerHTML = "กรุณาเลือกสถานีต้นทางก่อน!!!";
  								break;
  							}
  							else if(i > value){
  								var opt = document.createElement("option");
  								sel.appendChild(opt);
  								opt.setAttribute("value", i);
  								opt.innerHTML = stations[i-1];
  							}
  						}
  					}
			}
			document.getElementById('way').addEventListener('click', show_selected);
			function date_selected(){
				var today = new Date();
				var expire = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
				var selector = document.getElementById('ticket');
    			var value = selector[selector.selectedIndex].value;
    			if(value == 2){
    				var expire = today.setDate(today.getDate()+29);
    				var expire = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    			}
    			var showdate = document.getElementById('expired');
    			showdate.innerHTML = expire;
			}
			/* var today = new Date();
				var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();*/
			document.getElementById('ticket').addEventListener('click', date_selected);
		</script>