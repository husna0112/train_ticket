<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<h1>Online East Train Ticket Booking</h1>
	<h1>ซื้อตั๋วรถไฟสายตะวันออกออนไลน์</h1>
	<form id="data">
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
		</p>
		<p>ราคา: 
			<span id="price" value=""></span>
		</p>
	</form>
</body>

</html>

<!--Javascript-->
<script type="text/javascript">

	var stations = ['A','B','C','D','E','F','G'];
    var ord1 = ['06:00','07:00','08:00'];
    var ord2 = ['18:00','19:00','20:00'];
    var ord3 = ['07:00','08:00','09:00'];
    var ord4 = ['17:00','18:00','19:00'];
    var goname = ["ord1","ord2"];
    var backname = ["ord3","ord4"];
    var gotrain = [ord1, ord2];
    var backtrain = [ord3, ord4];

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
        document.getElementById('slast').addEventListener('click', show_time);
        document.getElementById('type').addEventListener('click', show_time);
	}

    function show_time(){
        var way_check = document.getElementById("way");
        var way_value = way_check[way_check.selectedIndex].value;
        var type_check = document.getElementById('type');
        var type_value = type_check[type_check.selectedIndex].value;
        if(way_value == 1){
            var trainname = gotrain;
            var name = goname;
        }
        else if(way_value == 2){
            var trainname = backtrain;
            var name = backname;
        }
        var count = 0;
        var slast_check = document.getElementById("slast");
        var slast_value = slast_check[slast_check.selectedIndex].value;
        var sfirst_check = document.getElementById('sfirst');
        var sfirst_value = sfirst_check[sfirst_check.selectedIndex].value;
        var stime_check = document.getElementById("stime");
        if(slast_value == 0){
            //No Selection - Time
            stime_check.remove();
            sel1 = document.createElement("select");
            sel1.setAttribute("id", "stime");
            var opt1 = document.createElement("option");
            opt1.setAttribute("value", 0);
            opt1.innerHTML = "กรุณาเลือกสถานีปลายทางก่อน!!!";
            sel1.appendChild(opt1);
            document.getElementById("time").appendChild(sel1);
        }
        else{
            stime_check.remove();
            sel2 = document.createElement("select");
            sel2.setAttribute("id", "stime");
            document.getElementById("time").appendChild(sel2);
            for (i=0; i<trainname.length; i++){
                for (j=0; j<trainname[i].length; j++){
                    if(type_value == 1){
                        var today = new Date();
                        var time = today.getHours() + ":" + today.getMinutes();
                        if(trainname[i][j] > time){
                            //Train Name Show
                            if ((sfirst_value-1) == j){
                                var tname = name[i];
                            }
                            //Start Times Show
                            if ((sfirst_value-1) == j){
                                var start = trainname[i][j];
                            }
                            //Finish Times Show
                            if((slast_value) == j){
                                var finish = trainname[i][j];
                            }
                        }
                    }
                    else if(type_value == 2){
                        //Train Name Show
                        if ((sfirst_value-1) == j){
                            var tname = name[i];
                        }
                        //Start Times Show
                        if ((sfirst_value-1) == j){
                            var start = trainname[i][j];
                        }
                        //Finish Times Show
                        if((slast_value) == j){
                            var finish = trainname[i][j];
                        }
                    }
                }
                if(start != undefined && finish != undefined){
                    var opt2 = document.createElement("option");
                    opt2.setAttribute("value", i);
                    opt2.innerHTML = tname+": "+start+"-"+finish;
                    sel2.appendChild(opt2);
                    count += 1;
                }
            }
            if(count == 0){
            	if(type_value == 0){
            		var opt3 = document.createElement("option");
                	opt3.setAttribute("value", i);
                	opt3.innerHTML = "กรุณาเลือกประเภทตั๋วรถไฟก่อน!!!";
                	sel2.appendChild(opt3);
            	}
            	else{
            		var opt3 = document.createElement("option");
                	opt3.setAttribute("value", i);
                	opt3.innerHTML = "ไม่มีในตารางเดินรถไฟ";
                	sel2.appendChild(opt3);
            	}
            }
        }
    }

</script>