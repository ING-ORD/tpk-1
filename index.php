<?php $dbHost = 'localhost'; $dbUser = 'root'; $dbPass = ''; $dbName = 'timetable'; 
///Основной гинератор------------------------------------------------------
	$link = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName)
	or die("ошибка".mysqli_connect_error($link));
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Cache-Control" content="no-cache">
	<title>Расписание КЦПТ</title>
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="Style.css">
	<link rel="stylesheet" href="CSScheckbox.css">
	<link rel="stylesheet" href="CSSselectbox.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>

	<!-- JavaScript (JQuery) -->

	<script type="text/javascript">
		var alarm_TO = ["8:15","9:00","10:00","10:45","12:00","12:45","14:00","14:45","15:45","16:30","17:25","18:10"],
			alarm_DO = ["9:00","9:45","10:45","11:30","12:45","13:30","14:45","15:30","16:30","17:15","18:10","18:55"],
			alarmS_TO = ["8:15","9:00","9:50","10:35","11:50","12:35","13:30","14:15","15:10","15:55","16:45","17:30"],
			alarmS_DO = ["9:00","9:45","10:35","11:20","12:35","13:20","14:15","15:00","15:55","16:40","17:30","18:15"],
			to_do_Turn = [["9:45","11:30","13:30","15:30","17:15"],["10:00","12:00","14:00","15:45","17:25"]],
			to_do_STurn = [["9:45","11:20","13:20","15:00","16:40"],["9:50","11:50","13:30","15:10","16:45"]]

		function ajaxRequest(file,parametrs,func){
			$.ajax({
				url: file,
				type:"POST",
				data: parametrs ,
				datatype: "json",
				success: func
			});
			console.log(parametrs);
		}

		function getWeekDay(date) {
		    date = date || new Date();
		    var days = ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'];
		    var day = date.getDay();

		    return "Сегодня "+days[day];
		}

		function chengeAlarm(TO,DO,lesson_to,lesson_do,turn_to_do){
			var key_to = [2,3,5,6,8,9,11,12,14,15,17,18]
			var alarm = $("#bar .lesson")
			console.log(alarm.length)
			//Удаление класса is_day
			for (i=0; i<alarm.length ; i++) {
				alarm.removeClass("is_day")
			}
			//Добавление класса is_day в промежутке от TO до DO
			for (i=0; i<alarm.length ; i++) {
				if (TO<=i+1 && i+1<=DO) {
					document.querySelectorAll("#bar .lesson")[i].classList.add("is_day")
				}
			}
			//Изменение звонков уроков
			for (i=0; i<$("#bar .lesson div.time_alarm_an_para").length ; i++){
				document.querySelectorAll("#bar .lesson div.time_alarm_an_para")[i].innerHTML = lesson_to[i]+" : "+lesson_do[i]
			}
			//Изменение звонков перемен
			for (i=0; i<$("#bar .turn div.time_alarm_an_para").length ; i++){
				document.querySelectorAll("#bar .turn div.time_alarm_an_para")[i].innerHTML = turn_to_do[0][i]+" : "+turn_to_do[1][i]
			}
		}

		function check_day (answer,i){
			var html;
			if (answer[i].lesson.indexOf("|") != -1) {
				var lesson_1 = answer[i].lesson.substring(0,answer[i].lesson.indexOf("|"));
				var teacher_1 = answer[i].list.substring(0,answer[i].list.indexOf("|"));
				var room_1 = answer[i].room.substring(0,answer[i].room.indexOf("|"));

				var lesson_2 = answer[i].lesson.substring(answer[i].lesson.indexOf("|")+1,answer[i].lesson.length);
				var teacher_2 = answer[i].list.substring(answer[i].list.indexOf("|")+1,answer[i].list.length);
				var room_2 = answer[i].room.substring(answer[i].room.indexOf("|")+1,answer[i].room.length);

				html = "<tr class=\"table_"+i+"\"> <td class=\"cell_1\" rowspan =\"2\" >"+answer[i].number+"</td> <td class=\"cell_2\">"+lesson_1+"</td> <td class=\"cell_3\">"+teacher_1+"</td> <td class=\"cell_4\">"+room_1+"</td> </tr> <tr class=\"table_"+i+"\"> <td class=\"cell_2\">"+lesson_2+"</td> <td class=\"cell_3\">"+teacher_2+"</td> <td class=\"cell_4\">"+room_1+"</td> </tr>";
				return html;
			}else{
				html = "<tr class=\"table_"+ i +"\"><td class=\"cell_1\">"+ answer[i].number +"</td><td class=\"cell_2\">"+ answer[i].lesson +"</td><td class=\"cell_3\">"+ answer[i].list +"</td><td class=\"cell_4\">"+ answer[i].room +"</td></tr>";
				return html;
			}
			
		}

		function check_week (answer,i){
			var html = "";
			console.log(JSON.stringify(answer))
			if((answer[i][1].lessonList.indexOf("|") != -1)||(answer[i][2].lessonList.indexOf("|") != -1)||(answer[i][3].lessonList.indexOf("|") != -1)||(answer[i][4].lessonList.indexOf("|") != -1)||(answer[i][5].lessonList.indexOf("|") != -1)||(answer[i][6].lessonList.indexOf("|") != -1))
			{
				html += "<tr class=\"table_"+i+"\"> <td class=\"cell_1\" rowspan =\"2\" >"+answer[i][0]+"</td>"
				for (var k = 1;k < 3; k++){
					for (var j = 1;j < 7; j++){
						if (k == 1) {
							var lessonList = answer[i][j].lessonList.substring(0,answer[i][j].lessonList.indexOf("|"));
							var room = answer[i][j].room.substring(0,answer[i][j].room.indexOf("|"));
							if (lessonList == ""){
								var lessonList = answer[i][j].lessonList
								var room = answer[i][j].room
							}
						}else{
							if(j == 1){
								html += "</tr> <tr class=\"table_"+i+"\">"	
							}
							
							var lessonList = answer[i][j].lessonList.substring(answer[i][j].lessonList.indexOf("|")+1,answer[i][j].lessonList.length);
							var room = answer[i][j].room.substring(answer[i][j].room.indexOf("|")+1,answer[i][j].room.length);
						}
						if(answer[i][j].lessonList.indexOf("|") != -1){
							html += " <td>"+lessonList+"</td> <td >"+room+"</td>"
							
						}else{
							if(k==1){
								html += " <td rowspan =\"2\">"+lessonList+"</td> <td rowspan =\"2\">"+room+"</td>"
							}
						}

					}
				}		

				html += "</tr>"

			}else{
				html = "<tr class=\"table_ "+ i +"\"> <td class=\"cell_1\">"+ answer[i][0] +"</td> <td class=\"cell_2\">"+ answer[i][1].lessonList +"</td> <td class=\"cell_3\">"+ answer[i][1].room +"</td> <td class=\"cell_4\">"+ answer[i][2].lessonList +"</td> <td class=\"cell_5\">"+ answer[i][2].room +"</td> <td class=\"cell_6\">"+ answer[i][3].lessonList +"</td> <td class=\"cell_7\">"+ answer[i][3].room +"</td> <td class=\"cell_8\">"+ answer[i][4].lessonList +"</td> <td class=\"cell_9\">"+ answer[i][4].room +"</td> <td class=\"cell_10\">"+ answer[i][5].lessonList +"</td> <td class=\"cell_11\">"+ answer[i][5].room +"</td> <td class=\"cell_12\">"+ answer[i][6].lessonList +"</td> <td class=\"cell_13\">"+ answer[i][6].room +"</td> </tr>";
			}
			return html;
		}

		function funcList (data){
			var answer = JSON.parse(data);
			for (var i = 0 ; i<answer.length ; i++){
				if(i==0){
					$(".list").html("");
				}
				$(".list").append("<option value='"+(i+1)+"'>"+answer[i]+"</option>");
			}
		}

		function funcSeccess(data){
			var answer = JSON.parse(data);
			var TO =-1;
			var DO =-1;
			console.log(JSON.stringify(data))
			for (var i = 0; i < answer.length; i++) 
			{	
				if($("select#week").val() != 7){
					if(i==0){
						$("#week_day").html("");
						$("#week_day").append("<tr class=\"table_of_contents\"><th>Урок</th><th>Название предмета</th><th>Преподаватель</th><th>Кабинет</th></tr>");
						if ($("input.status").val() == "1"){
							$(".table_of_contents").children("th:nth-child(3)").html("Группа");
						}
					}
					$("#week_day").append( check_day( answer,i ) );
				}else
				{
					if(i==0){
						$("#week_day").html("");
						if($("input.status").val() == "1"){
							$("#week_day").append("<tr class=\"table_1\"> <td class=\"cell_1\" rowspan=\"2\">Урок</td> <td class=\"cell_2\" colspan=\"2\">Понедельник</td> <td class=\"cell_3\" colspan=\"2\">Вторник</td> <td class=\"cell_4\" colspan=\"2\">Среда</td> <td class=\"cell_5\" colspan=\"2\">Четверг</td> <td class=\"cell_6\" colspan=\"2\">Пятница</td> <td class=\"cell_7\" colspan=\"2\">Суббота</td> </tr> <tr class=\"group_teacher\"> <td class=\"cell_1\">Предмет/<br>Группа</td> <td class=\"cell_2\">Кабинет</td> <td class=\"cell_3\">Предмет/<br>Группа</td> <td class=\"cell_4\">Кабинет</td> <td class=\"cell_5\">Предмет/<br>Группа</td> <td class=\"cell_6\">Кабинет</td> <td class=\"cell_7\">Предмет/<br>Группа</td> <td class=\"cell_8\">Кабинет</td> <td class=\"cell_9\">Предмет/<br>Группа</td> <td class=\"cell_10\">Кабинет</td> <td class=\"cell_11\">Предмет/<br>Группа</td> <td class=\"cell_12\">Кабинет</td> </tr>");
						}else{
							$("#week_day").append("<tr class=\"table_1\"> <td class=\"cell_1\" rowspan=\"2\">Урок</td> <td class=\"cell_2\" colspan=\"2\">Понедельник</td> <td class=\"cell_3\" colspan=\"2\">Вторник</td> <td class=\"cell_4\" colspan=\"2\">Среда</td> <td class=\"cell_5\" colspan=\"2\">Четверг</td> <td class=\"cell_6\" colspan=\"2\">Пятница</td> <td class=\"cell_7\" colspan=\"2\">Суббота</td> </tr> <tr class=\"group_teacher\"> <td class=\"cell_1\">Предмет/<br>Преподаватель</td> <td class=\"cell_2\">Кабинет</td> <td class=\"cell_3\">Предмет/<br>Преподаватель</td> <td class=\"cell_4\">Кабинет</td> <td class=\"cell_5\">Предмет/<br>Преподаватель</td> <td class=\"cell_6\">Кабинет</td> <td class=\"cell_7\">Предмет/<br>Преподаватель</td> <td class=\"cell_8\">Кабинет</td> <td class=\"cell_9\">Предмет/<br>Преподаватель</td> <td class=\"cell_10\">Кабинет</td> <td class=\"cell_11\">Предмет/<br>Преподаватель</td> <td class=\"cell_12\">Кабинет</td> </tr>");
						}

					}
					$("#week_day").append( check_week( answer,i ) );
				}
				if ($("#week_day .table_"+i+"").children("td:nth-child(2)").text() !== "" && TO == -1 && DO == -1 ){
					TO = parseInt($("#week_day .table_"+i+"").children("td:nth-child(1)").text())
					DO = parseInt($("#week_day .table_"+i+"").children("td:nth-child(1)").text())
					
				}else if ($("#week_day .table_"+i+"").children("td:nth-child(2)").text() !== "" && $("#week_day .table_"+i+"").children("td:nth-child(1)").text() > DO ){
					DO = parseInt($("#week_day .table_"+i+"").children("td:nth-child(1)").text())
				}


			}
			if($("select#week").val() < 6 && TO != -1 && DO !=-1){
				isDayWeek = ['!', 'Сегодня понедельник', 'Сегодня вторник', 'Сегодня среда', 'Сегодня четверг', 'Сегодня пятница'][$("select#week").val()] == getWeekDay() ? "Сегодня" : ["!","В понеднльник","Во вторник","В среду","В четверг","В пятницу"][$("select#week").val()]

				$(".TO-DO").html(isDayWeek+" с : "+alarm_TO[TO-1]+" до :"+alarm_DO[DO-1])
				chengeAlarm(TO,DO,alarm_TO,alarm_DO,to_do_Turn)

			}else if ($("select#week").val() == 6 && TO != -1 && DO !=-1){

				isDayWeek = "Сегодня суббота" == getWeekDay() ? "Сегдня" : "В субботу"
				$(".TO-DO").html(isDayWeek+" с : "+alarmS_TO[TO-1]+" до : "+alarmS_DO[DO-1])
				chengeAlarm(TO,DO,alarmS_TO,alarmS_DO,to_do_STurn)

			} else if ($("select#week").val() != 7) {
				$(".TO-DO").html("В "+['Воскресенье', 'понедельник', 'вторник', 'среду', 'четверг', 'пятницу', 'субботу'][$("select#week").val()]+" нет пар")
				$("#week_day").html("")
			}
			if($("select#week").val() == 7){
				$(".TO-DO").html("")
			}
			// alert("ТО:"+TO +" DO:"+DO)
		};

		$(document).ready(function (){
			//ЛОГИКА ДЛЯ КНОПКИ ЗВОНКИ

			$(".but-alarm_text").on("click", function(){
				$(".popap").css({'display':'block'})
			})

			$(".blyr").on("click", function(){
				$(".popap").css({'display':'none'})
			})

			//КОНЕЦ ЛОГИКИ ДЛЯ КНОПКИ ЗВОНКИ
			
			//ЛОГИКА КНОПКИ ИЗМЕНЕНИЯ

			$("input.change").on("click", function(){
				if($("input.status").val() == "0")
				{
					if($("input.change").val() == "1"){
						$("input.change").val("0");
						ajaxRequest("request.php",{ 
								change: $("input.change").val(),
								status: document.querySelector("#nav li a.active").getAttribute("value"),
								group: $("select.list").val(),
								week: $("select#week").val()
							},funcSeccess)
					}else{
						$("input.change").val("1");
						ajaxRequest("request.php",{ 
								change: $("input.change").val(),
								status: document.querySelector("#nav li a.active").getAttribute("value"),
								group: $("select.list").val(),
								week: $("select#week").val()
							},funcSeccess)
					}
				}else
				{
					$("input.change").val("0");
					ajaxRequest("request.php",{ 
							change: $("input.change").val(),
							status: document.querySelector("#nav li a.active").getAttribute("value"),
							teacher: $("select.list").val(),
							week: $("select#week").val()
						})
				}
			})

			//ЛОГИКА ДЛЯ СПИСКА СТУДЕНТ/ПРЕПОДАВАТЕЛЬ
			
			$("select.list").on("click", function(){
				statusVal = document.querySelector("#nav li a.active").getAttribute("value");
				if(statusVal == "0")
				{	
					ajaxRequest("request.php",{ 
							change: $("input.change").val(),
							status: statusVal,
							group: $("select.list").val(),
							week: $("select#week").val()
						},funcSeccess)
				}else
				{
					ajaxRequest("request.php",{ 
							change: $("input.change").val(),
							status: statusVal,
							teacher: $("select.list").val(),
							week: $("select#week").val()
						},funcSeccess)
				}
				$("select.list").removeClass("open");
				$(this).removeClass("op-sel");
				
			});

			//ЛОГИКА ДЛЯ МЕНЮ С ДНЯМИ НЕДЕЛИ

			$("select#week").on("click", function(){
				statusVal = document.querySelector("#nav li a.active").getAttribute("value");	
				isWeek = $("select#week").val()	//document.querySelector("form.container").style.display = "none";	
				if (isWeek == "7"){
					document.querySelector(".progress").style.display = "none";
				}else{
					document.querySelector(".progress").style.display = "flex";
				}	
				if(statusVal == "0"){
					ajaxRequest("request.php",{ 
							change: $("input.change").val(),
							status: statusVal,
							group: $("select.list").val(),
							week: $("select#week").val()
						},funcSeccess)
				}else{
					ajaxRequest("request.php",{ 
							change: $("input.change").val(),
							status: statusVal,
							teacher: $("select.list").val(),
							week: $("select#week").val()
						},funcSeccess)
				}
				$("select[name='groups']").removeClass("open");
				$(this).removeClass("op-sel");
				
			});


			//ЛОГИКА ДЛЯ КНОПКИ ГРУППА/ПРЕПОДАВАТЕЛЬ

			$("div.status input.status").on("click",function(){
					ajaxRequest("list_request.php",{
							status: $("input.status").val()
						},funcList)
				if ($("input.status").val() == "0") {
					$("input.status").val("1");
					ajaxRequest("request.php",{
							change: $("input.change").val(),
							status: document.querySelector("#nav li a.active").getAttribute("value"),
							teacher: $("select.list").val(),
							week: $("select#week").val()
						},funcSeccess)
					$("label#status").html("Преподаватель");
					$(".table_of_contents").children("th:nth-child(3)").html("Группа");
				}else{
					$("input.status").val("0");
					ajaxRequest("request.php",{
							change: $("input.change").val(),
							status: document.querySelector("#nav li a.active").getAttribute("value"),
							group: $("select.list").val(),
							week: $("select#week").val()
						},funcSeccess)
					$("label#status").html("Группа");
					$(".table_of_contents").children("th:nth-child(3)").html("Преподаватель");
				}
			});
		});
	</script>

	<!--End JavaScript (Jquery)!-->

</head>
<body>
	<h1>Расписание КЦПТ</h1>
	<a href="#" class="btn btn-primary popup-btn">Настройки</a>
	
	
	<form class="container" name="ginerat"  action="" method="post" style="display: none;">
		<ul class="nav nav-tabs" id="nav">
			<li class="nav-item">
				<a class="nav-link active status1" href="#" value="0">Студенты</a>
			</li>
			<li class="nav-item">
				<a class="nav-link status0" href="#" value="1">Преподаватели</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link disabled" href="#">Студенты с изменениями</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Преподаватели  с изменениями</a>
			</li> -->
		</ul>
		<!-- <div class="status" style="desplay:none">
			<label for="status">Статус</label>
			<label name="status">
				<input type="checkbox" class="status" name="" value="0">
				<span class="check"></span>
				<span class="text on">Преподаватель</span>
				<span class="text off">Студент</span>
			</label>
		
		</div> -->
	
		<div class="row row justify-content-center mt-2 mb-2">
			
			<div class="col-md-5">
				<a class="btn btn-primary btn-change" href="https://docs.google.com/file/d/0Bzp0m-6aOGdLZVFwcHdUcElLY2c/preview" target="_blank">Изменения</a>
			</div>
			
			<!-- <div class="but-alarm col-md-5">
			
				<div class="btn btn-primary but-alarm_text">Звонки</div>
				<div style="display: none;" class="popap">
					<div class="blyr"></div>
					<div class="but-alarm_cont">
						<table class="content">
							<tr><th>Понеденельник-<br>Пятница</th><th>Суббота</th></tr>
							<?php 
								//for ($i=0; $i < 12; $i++) { ?>
								<script>
									$(".but-alarm_cont table.content").append("<tr><td>"+ alarm_TO[<?php //echo ($i); ?>]+ "-" + alarm_DO[<?php //echo ($i); ?>] + "</td><td>"+ alarmS_TO[<?php echo ($i); ?>]+ "-" + alarmS_DO[<?php echo ($i); ?>] +"</td></tr>");
								</script>
								<?php// }
							?>
						</table>
					</div>
				</div>
			</div> -->
		</div>
		<div class="row justify-content-between">
				

			<?php

				$query_week = "SELECT week.name FROM week;";

				$result_week = mysqli_query($link,$query_week) 
				or die("ошибка ".mysqli_connect_error($link));
				$rows_week  = mysqli_num_rows($result_week);

				echo "<div class=\"week_form  col-md-5\"><div class=\"row\"><div class=\"col-md-4\"><label style=\"display: inline-block; width: 125px\">День недели</label></div>";
				echo "<div class=\"col-md-8\"><select name='week' id='week' class='box' value = '".$day_id."'>";
				for ($g = 1;$g<$rows_week+1;++$g){
					$row_week = mysqli_fetch_row($result_week);
					echo "<option value = \"".$g."\"><a href =\"#\">".$row_week[0]."</a></option>";
				}
				echo "<option value='7'>Неделя</option>";
				mysqli_free_result($result_week);
				echo "</select></div></div></div>";
			?>
			<?php 
				$query_groups = "SELECT groups.name FROM groups;";

				$result_groups = mysqli_query($link,$query_groups) 
				or die("ошибка ".mysqli_connect_error($link));

				$rows_groups  = mysqli_num_rows($result_groups);
				echo "<div class=\"list_form  col-md-5\"><label id=\"status\" style=\"display: inline-block; width: 85px\">Группа</label>";
				echo "<select name='groups' class= 'list box' id='groups'>";

				for ($g = 1;$g<$rows_groups+1;++$g){
					$row_groups = mysqli_fetch_row($result_groups);
					echo "<option ";
					if ($g == 1){echo "selected";}
					echo " value = \"".$g."\">";
					echo "<a href =\"#\">".$row_groups[0]."</a>";
					echo "</option>";
				}
				mysqli_free_result($result_groups);
				echo "</select></div>";
			?>
		</div>

			<!-- <div class="change">
				<label for="change">Изменения</label>
				<label name="change">
					<input type="checkbox" class="change" name="" value="0">
					<span class="check"></span>
					<span class="text on">С</span>
					<span class="text off">Без</span>
				</label>
			</div> -->

        
	</form>
	<div class = "is_blur"></div>
	<div class="container-progress">
		<div class="time_day"><script>$(".time_day").html(getWeekDay())</script></div>
		<div class="progress" id="bar" style="height: 25px;">
			<div class="time_alarm" style="width: 3.333%"></div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>1 урок</div><div class="time_alarm_an_para">8:15 - 9:00</div></span>1</div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>2 урок</div><div class="time_alarm_an_para">9:00 - 9:45</div></span>2</div>
			<div class="time_alarm turn" style="width: 6.666%"><span class="popup-progress"><div>Перемена</div><div class="time_alarm_an_para">9:45 - 10:00</div></span></div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>3 урок</div><div class="time_alarm_an_para">10:00 - 10:45</div></span>3</div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>4 урок</div><div class="time_alarm_an_para">10:45 - 11:30</div></span>4</div>
			<div class="time_alarm turn" style="width: 6.666%"><span class="popup-progress"><div>Перемена</div><div class="time_alarm_an_para">11:30 - 12:00</div></span></div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>5 урок</div><div class="time_alarm_an_para">12:00 - 12:45</div></span>5</div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>6 урок</div><div class="time_alarm_an_para">12:45 - 13:30</div></span>6</div>
			<div class="time_alarm turn" style="width: 6.666%"><span class="popup-progress"><div>Перемена</div><div class="time_alarm_an_para">13:30 - 14:00</div></span></div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>7 урок</div><div class="time_alarm_an_para">14:00 - 14:45</div></span>7</div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>8 урок</div><div class="time_alarm_an_para">14:45 - 15:30</div></span>8</div>
			<div class="time_alarm turn" style="width: 6.666%"><span class="popup-progress"><div>Перемена</div><div class="time_alarm_an_para">15:30 - 15:45</div></span></div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>9 урок</div><div class="time_alarm_an_para">15:45 - 16:30</div></span>9</div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>10 урок</div><div class="time_alarm_an_para">16:30 - 17:15</div></span>10</div>
			<div class="time_alarm turn" style="width: 6.666%"><span class="popup-progress"><div>Перемена</div><div class="time_alarm_an_para">17:15 - 17:25</div></span></div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>11 урок</div><div class="time_alarm_an_para">17:25 - 18:10</div></span>11</div>
			<div class="time_alarm lesson" style="width: 9.999%"> <span class="popup-progress"><div>12 урок</div><div class="time_alarm_an_para">18:10 - 18:55</div></span>12</div>
			<div class="time_alarm" style="width: 3.333%"></div>
		</div>
	</div>
	<?php 

		mysqli_close($link);
	?>	
	<div class="main">
		<div class="TO-DO"></div>
		<div class="weekend">
			
		</div>
		<div class="week_day">
			<table id="week_day">
				
			</table>
		</div>
	</div>
	<script>
		var linkNav = document.getElementById("nav")
		linkNav.addEventListener('click', function(e) {
			if (!e.target.classList.contains('nav-link') || e.target.classList.contains("disabled")) 
				return; 
			e.preventDefault();                                
			for (let link of this.querySelectorAll('li a.nav-link'))  
				link.classList.remove('active'); 
			e.target.classList.add('active');
			if (e.target.classList.contains('status0')){
				ajaxRequest("list_request.php",{
						status: "0"
					},funcList)
				ajaxRequest("request.php",{ 
						change: $("input.change").val(),
						status: "1",
						teacher: $("select.list").val(),
						week: $("select#week").val()
					},funcSeccess)
			}else if ( e.target.classList.contains('status1') ) {
				ajaxRequest("list_request.php",{
						status: "1"
					},funcList)
				ajaxRequest("request.php",{ 
					change: $("input.change").val(),
					status: "0",
					group: $("select.list").val(),
					week: $("select#week").val()
				},funcSeccess)
			}          
		}); 
		document.querySelector(".popup-btn").addEventListener("click",function(){
			var form = document.querySelector("form.container");
			if (form.style.display == "none"){
				form.style.display = "block";
				document.body.classList.add("no-scroll");
				document.querySelector(".is_blur").classList.add("blur");
			}
			if (!document.querySelector(".popup-btn.onc")){
				ajaxRequest("request.php",{ 
					change: $("input.change").val(),
					status: "0",
					group: $("select.list").val(),
					week: $("select#week").val()
				},funcSeccess);
				document.querySelector(".popup-btn").classList.add("onc");
			}
		
			document.querySelector(".is_blur.blur").addEventListener("click",function(){
				document.querySelector("form.container").style.display = "none";
				document.body.classList.remove("no-scroll");
				document.querySelector(".is_blur").classList.remove("blur");
			});
		
		});
	</script>
</body>
</html>