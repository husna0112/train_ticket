<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body>
	<h1>Online East Train Ticket Booking</h1>
	<h1>ซื้อตั๋วรถไฟสายตะวันออกออนไลน์</h1>
	<form action="bank.php" method="post">
		<p id="data" style="display:none"></p>
		<p>ประเภทตั๋ว: 
			<select id="type">
				<option value="0">กรุณาเลือกประเภทตั๋ว</option>
				<option value="1">1 วัน</option>
				<option value="2">30 วัน</option>
			</select>
		</p>
		<p>วันหมดอายุ: <span id="expdate">-</span></p>
		<p>เส้นทาง: 
			<select id="way">
				<option value="0">กรุณาเลือกเส้นทาง</option>
				<option value="1">กรุงเทพมหานคร (หัวลำโพง) - ชุมทางฉะเชิงเทรา</option>
				<option value="2">ชุมทางฉะเชิงเทรา - กรุงเทพมหานคร (หัวลำโพง)</option>
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
			<input id="minus" type="button" value="-">
			<input id="amount" type="button" value=0>
			<input id="plus" type="button" value="+">
		</p>
		<p>ราคา: <span id="price">-</span> บาท</p>
		<button id="submit" style="display:none">ต่อไป</button>
	</form>
</body>

</html>

<!--Javascript-->
<script type="text/javascript">

	var btn = document.getElementById("submit");
	var price_check = document.getElementById("price");
	var amount_check = document.getElementById("amount");
    var stations = ['กรุงเทพมหานคร (หัวลำโพง)','อุรุพงษ์','พญาไท','ราชปรารภ','มักกะสัน',
    				'อโศก','คลองตัน','สุขุมวิท 71','หัวหมาก','บ้านทับช้าง',
    				'ซอยวัดลานบุญ','ลาดกระบัง','พระจอมเกล้า','หัวตะเข้','คลองหลวงแพ่ง',
    				'คลองอุดมชลจร','เปรง','คลองแขวงกลั่น','คลองบางพระ','บางเตย',
    				'ชุมทางฉะเชิงเทรา'];
    var priceindex = [0,2,2,2,2,
    				  2,2,2,3,5,
    				  5,6,6,7,9,
    				  9,10,11,12,12,
    				  13];
    var goname = ['ORD 275','ORD 283','ORD 285','ORD 281','ORD 367',
                    'ORD 389','ORD 279','ORD 277','ORD 391','ORD 383','ORD 371',
                    'ORD 385','ORD 381'];
    var backname = ['ORD 372', 'ORD 384', 'ORD 278', 'ORD 280', 'ORD 388', 'ORD 368',
                      'ORD 282', 'ORD 284', 'ORD 276', 'ORD 390', 'ORD 286', 'ORD 394',
                      'ORD 386'];
    //Go Train (หัวลำโพง-ฉะเชิงเทรา) Schedule
    var ord_275 = ['05:55','-----','06:10','06:15','06:20','06:26','06:36',
               	   '-----','06:43','06:48','-----','06:55','07:00','07:03',
               	   '07:11','07:15','07:19','07:24','07:28','07:31','07:40'];

    var ord_283 = ['06:55','-----','07:08','07:12','07:16','07:22','07:40',
               	   '-----','07:49','07:57','-----','08:06','08:10','08:14',
               	   '08:24','08:29','08:34','08:40','08:46','08:51','08:59'];

	var ord_285 = ['06:55','-----','07:08','07:12','07:16','07:22','07:40',
               	   '-----','07:49','07:57','-----','08:06','08:10','08:14',
                   '08:24','08:29','08:34','08:40','08:46','08:51','08:56'];    

	var ord_281 = ['08:00','-----','08:11','-----','08:16','08:20','08:26',
                   '-----','08:35','08:44','-----','08:51','08:55','08:57',
                   '09:06','09:10','09:14','-----','09:23','-----','09:32'];

    var ord_367 = ['10:10','10:20','10:23','-----','10:30','10:34','10:40',
                   '10:43','10:49','10:56','-----','11:02','11:07','11:09',
                   '11:18','-----','11:25','11:31','11:35','11:40','11:45'];

    var  ord_389 = ['12:10','-----','12:20','12:23','12:28','12:32','12:37',
                    '-----','12:44','12:50','-----','12:57','13:01','13:04',
               	    '13:11','-----','13:17','-----','13:23','-','13:30'];

    var  ord_279 = ['13:05','-----','13:13','13:15','13:17','13:20','13:24',
               	    '-----','13:30','13:36','-----','13:42','13:46','13:48',
               	    '13:55','13:59','14:02','-----','14:08','-----','14:21']; 

    var ord_277 = ['15:25','15:38','15:41','15:43','15:45','15:48','15:52',
               	   '15:54','15:59','16:05','16:08','16:12','16:16','16:18',
               	   '16:24','16:27','16:30','16:34','16:37','16:40','16:44'];

	var ord_391 = ['16:35','16:43','16:46','16:50','16:54','16:58','17:02',
               	   '-----','17:09','17:15','-----','17:22','17:26','17:30',
               	   '17:37','-----','17:43','-----','17:49','-----','17:55'];

    var ord_383 = ['17:00','17:09','17:12','-----','17:18','17:23','17:29',
               	   '17:33','17:40','17:47','17:53','17:58','18:04','18:07',
               	   '18:17','18:23','18:28','18:34','18:39','18:44','18:50'];

    var ord_371 = ['17:40','17:49','17:53','17:56','18:02','18:06','18:11',
               	   '18:13','18:18','18:24','18:29','18:34','18:39','18:42',
                   '18:51','18:56','19:01','19:06','19:11','19:16','19:24'];

    var ord_385 = ['18:25','18:33','18:35','18:37','18:40','18:43','18:47',
                   '18:49','18:54','19:00','19:03','19:07','19:11','19:13',
                   '19:20','-----','19:26','19:30','19:34','-----','19:40'];

    var ord_381 = ['18:25','18:34','18:37','-----','18:43','18:47','18:52',
                   '18:56','19:02','19:09','19:13','19:17','19:22','19:24',
                   '19:33','-----','19:40','19:45','19:49','-----','19:55'];

    var gotrain = [ord_275, ord_283, ord_285, ord_281, ord_367, ord_389, ord_279,
               ord_277, ord_391, ord_383, ord_371, ord_385, ord_381];

    //Back Train Schedule
    var ord_372 = ['06:19','06:25','06:30','06:34','06:41','06:45','06:50',
                   '07:01','07:04','07:10','07:14','07:19','07:28','07:34',
                   '07:39','07:46','07:51','07:55','07:58','08:02','08:15'];
    var ord_384 = ['05:45','05:50','05:55','06:00','06:06','06:11','06:16',
                   '06:26','06:28','06:34','06:38','06:43','06:50','06:56',
                   '07:02','07:08','07:18','07:21','07:26','07:30','07:45'];
    var ord_278 = ['08:31','08:37','08:41','08:47','08:52','08:56','09:01',
                   '09:11','09:14','09:20','09:26','09:32','09:39','-----',
                   '09:48','09:53','09:58','10:01','10:05','-----','10:15'];
    var ord_280 = ['10:22','10:29','10:33','10:38','10:44','10:50','10:56',
                   '11:07','11:10','11:15','-----','11:22','11:29','-----',
                   '11:38','11:44','11:48','11:50','11:53','-----','12:05'];
    var ord_388 = ['07:05','-----','07:12','-----','07:19','-----','07:27',
                   '07:35','07:37','07:42','-----','07:50','07:56','08:02',
                   '08:05','08:10','08:16','08:18','08:21','-----','08:35'];
    var ord_368 = ['12:35','12:40','12:44','12:49','12:55','13:00','13:05',
                   '13:16','13:18','13:23','-----','13:30','13:37','13:42',
                   '13:45','13:50','13:54','13:57','13:59','14:02','14:10'];
    var ord_282 = ['15:34','-----','15:42','-----','15:51','-----','16:00',
                   '16:09','16:12','16:18','-----','16:26','16:33','-----',
                   '16:42','16:48','16:55','-----','17:00','-----','17:15'];
    var ord_284 = ['16:20','16:27','16:33','16:38','16:44','16:49','16:55',
                   '17:06','17:09','17:15','17:21','17:27','17:41','17:47',   
                   '17:51','17:56','18:01','-----','18:06','18:09','18:15'];
    var ord_276 = ['18:00','18:06','18:11','18:16','18:22','18:27','18:33',
                   '18:42','18:45','18:51','-----','18:59','19:06','-----',
                   '19:15','19:20','19:25','19:27','19:30','-----','19:40'];
    var ord_390 = ['14:05','-----','14:12','-----','14:19','-----','14:27',
                   '14:35','14:37','14:42','-----','14:50','14:56','-----',
                   '15:03','15:08','15:12','15:15','15:18','-----','15:25'];
    var ord_286 = ['16:20','16:27','16:33','16:38','16:44','16:49','16:55',
                   '17:06','17:09','17:15','17:21','17:27','17:41','17:47',
                   '17:51','17:56','18:01','18:03','18:06','18:09','18:15'];
    var ord_394 = ['19:25','-----','19:33','-----','19:41','-----','19:50',
                   '19:59','20:02','20:07','-----','20:14','20:21','20:27',
                   '20:30','20:35','20:39','20:41','20:44','20:47','20:55'];
    var ord_386 = ['20:05','-----','20:12','-----','20:21','-----','20:29',
                   '20:38','20:40','20:45','-----','20:52','20:59','21:05',
                   '21:08','21:12','21:16','21:18','21:21','21:23','21:30'];
    var backtrain = [ord_372, ord_384, ord_278, ord_280, ord_388, ord_368, ord_282,
               ord_284, ord_276, ord_390, ord_286, ord_394, ord_386];


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
    		btn.style.display = "none";
    		price_check.innerHTML = "-";
    		amount_check.value = 0;
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
    	else if(way_value == 2){
    		stations.reverse();
    		priceindex.reverse();
    	}
    	if(way_value > 0){
    		sfirst_check.remove();
    		sel = document.createElement("select");
    		sel.setAttribute("id", "sfirst");
    		for (i=0; i<parseInt(stations.length)+1; i++){
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
    		btn.style.display = "none";
    		price_check.innerHTML = "-";
    		amount_check.value = 0;
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
  			btn.style.display = "none";
  			price_check.innerHTML = "-";
  			amount_check.value = 0;

  		}
    	else{
    		slast_check.remove();
    		sel1 = document.createElement("select");
    		sel1.setAttribute("id", "slast");
    		var opt = document.createElement("option");
    		opt.setAttribute("value", 0);
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
            btn.style.display = "none";
            price_check.innerHTML = "-";
            amount_check.value = 0;
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
                if(start != undefined && finish != undefined && start != "-----" && finish != "-----"){
                    var opt2 = document.createElement("option");
                    opt2.setAttribute("value", parseInt(i)+1);
                    opt2.innerHTML = tname+": "+start+"-"+finish;
                    sel2.appendChild(opt2);
                    count += 1;
                }
            }
            if(count == 0){
            	stime_check.remove();
            	sel3 = document.createElement("select");
            	sel3.setAttribute("id", "stime");
            	if(type_value == 0){
            		var opt3 = document.createElement("option");
                	opt3.setAttribute("value", 0);
                	opt3.innerHTML = "กรุณาเลือกประเภทตั๋วรถไฟก่อน!!!";
                	sel2.appendChild(opt3);
                	btn.style.display = "none";
                	price_check.innerHTML = "-";
                	amount_check.value = 0;
            	}
            	else{
            		var opt3 = document.createElement("option");
                	opt3.setAttribute("value", 0);
                	opt3.innerHTML = "ไม่มีในตารางเดินรถไฟ";
                	sel2.appendChild(opt3);
                	btn.style.display = "none";
                	price_check.innerHTML = "-";
                	amount_check.value = 0;
            	}
            }
        }
        document.getElementById('plus').addEventListener('click', show_price);
        document.getElementById('minus').addEventListener('click', show_price);
    	document.getElementById('stime').addEventListener('click', show_price);
      document.getElementById('slast').addEventListener('click', show_price);
    }
    function show_price(){
    	var sfirst_check = document.getElementById("sfirst");
    	var sfirst_value = sfirst_check[sfirst_check.selectedIndex].value;
    	var slast_check = document.getElementById("slast");
    	var slast_value = slast_check[slast_check.selectedIndex].value;
    	var stime_check = document.getElementById("stime");
    	var stime_value = stime_check[stime_check.selectedIndex].value;
    	var amount_check = document.getElementById("amount");
    	var amount_value = amount_check.value;
    	if(stime_value == 0){
    		price_check.innerHTML = "-";
    		btn.style.display = "none";
    		amount_check.value = 0;
    	}
    	else if(parseInt(amount_value) <= 0){
    		price_check.innerHTML = "-";
    		btn.style.display = "none";
    		amount_check.value = 0;
    	}
    	else if(amount_value > 0){
    		var price_val = Math.abs(priceindex[parseInt(sfirst_value)-1]-priceindex[parseInt(slast_value)]);
    		if(price_val >= 2){
    			price_check.innerHTML = price_val*parseInt(amount_value);
    		}
    		else{
    			price_check.innerHTML = 2*parseInt(amount_value);
    		}
    		btn.style.display = "inline";
    	}
    }
    function plus_ticket(){
    	var amount_check = document.getElementById("amount");
    	var amount_value = amount_check.value;
    	amount_check.value = parseInt(amount_value)+1;
    }
    function minus_ticket(){
    	var amount_check = document.getElementById("amount");
    	var amount_value = amount_check.value;
    	if(amount_value > 0){
    		amount_check.value = parseInt(amount_value)-1;
    	}
    }
    document.getElementById('plus').addEventListener('click', plus_ticket);
    document.getElementById('minus').addEventListener('click', minus_ticket);

    function sendtophp(){
    	var passvalue = document.getElementById("data");
    	passvalue.innerHTML = '';
    	var ticket_type = document.getElementById("type");
    	var ticket_type_text = ticket_type[ticket_type.selectedIndex].text;
    	var expire_date = document.getElementById("expdate");
    	var expire_date_text = expire_date.innerHTML;
    	var way = document.getElementById("way");
    	var way_text = way[way.selectedIndex].text;
    	var first_station = document.getElementById("sfirst");
    	var first_station_text = first_station[first_station.selectedIndex].text;
    	var last_station = document.getElementById("slast");
    	var last_station_text = last_station[last_station.selectedIndex].text;
    	var station_time = document.getElementById("stime");
    	var station_time_text = station_time[station_time.selectedIndex].text;
    	var ticket_amount = document.getElementById("amount");
    	var ticket_amount_text = ticket_amount.value;
    	var price = document.getElementById("price");
    	var price_text = price.innerHTML;

    	type_p = document.createElement("input");
    	type_p.setAttribute("name","type");
    	type_p.setAttribute("value",ticket_type_text);
    	passvalue.appendChild(type_p);
    	
    	ex_p = document.createElement("input");
    	ex_p.setAttribute("name","expire");
    	ex_p.setAttribute("value",expire_date_text);
    	passvalue.appendChild(ex_p);

    	way_p = document.createElement("input");
    	way_p.setAttribute("name","way");
    	way_p.setAttribute("value",way_text);
      passvalue.appendChild(way_p);

    	first_p = document.createElement("input");
    	first_p.setAttribute("name","first_station");
    	first_p.setAttribute("value",first_station_text);
    	passvalue.appendChild(first_p);

    	last_p = document.createElement("input");
    	last_p.setAttribute("name","last_station");
    	last_p.setAttribute("value",last_station_text);
    	passvalue.appendChild(last_p);

    	time_p = document.createElement("input");
    	time_p.setAttribute("name","time");
    	time_p.setAttribute("value",station_time_text);
    	passvalue.appendChild(time_p);

    	amount_p = document.createElement("input");
    	amount_p.setAttribute("name","ticket_amount");
    	amount_p.setAttribute("value",ticket_amount_text);
    	passvalue.appendChild(amount_p);
    	
    	price_p = document.createElement("input");
    	price_p.setAttribute("name","price");
    	price_p.setAttribute("value",price_text);
    	passvalue.appendChild(price_p);
    }
    document.getElementById('submit').addEventListener('click', sendtophp);
</script>