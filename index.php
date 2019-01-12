<?php $dbHost = 'localhost'; $dbUser = 'root'; $dbPass = ''; $dbName = 'timetable'; 
///Основной гинератор------------------------------------------------------
	if(!isset($_POST)) {
		echo "Да";
	}
	$day_id = $_POST["week"];
	$groups_id = $_POST["groups"];
	$teachers_id_num = $_POST["teacher_id"];
	settype($day_id, 'integer');
	settype($teachers_id_num, 'integer');
	settype($groups_id, 'integer');

	if (!isset($_POST["week"]))
	{
		$day_id = 1;
	}

	if (!isset($_POST["groups"]))
	{
		$groups_id = 1;
	}	

	if (!isset($_POST["teacher"]))
	{
		$teachers_id = 1;
	}

	if (!isset($_POST["teacher_id"]))
	{
		$teachers_id_num = 1;
	}

	if($day_id != '7')
		{
			$query_add = " AND timetable.day = '".$day_id."'";
		}else{
			$query_add = "";
		}
	$link = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName)
	or die("ошибка".mysqli_connect_error($link));

	$teacher_name_id = "SELECT number FROM timetable WHERE (timetable.teacher = '".$teachers_id_num."'".$query_add.");";


	$teacher_id = mysqli_query($link, $teacher_name_id)
	or die ("ошибка2 ".mysqli_connect_error($link));
	$teacher_rows_id = mysqli_num_rows($teacher_id);

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Cache-Control" content="no-cache">
	<title>Расписание КЦПТ</title>
	<link rel="stylesheet" href="Style.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>

	<!-- JavaScript (JQuery) -->

	<script type="text/javascript">
		var alarm_TO = ["8:15","9:00","9:55","10:40","11:55","12:40","13:55","14:40","15:40","16:25","17:20","18:05"],
			alarm_DO = ["9:00","9:45","10:40","11:25","12:40","13:25","14:40","15:25","16:25","17:10","18:05","18:50"],
			alarmS_TO = ["8:15","9:00","9:50","10:35","11:50","12:35","13:30","14:15","15:10","15:55","16:45","17:30"],
			alarmS_DO = ["9:00","9:45","10:35","11:20","12:35","13:20","14:15","15:00","15:55","16:40","17:30","18:15"]

		alert("ss");
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
				$(".TO-DO").html("Cегодня с : "+alarm_TO[TO-1]+" до :"+alarm_DO[DO-1])
			}else if ($("select#week").val() == 6 && TO != -1 && DO !=-1){
				$(".TO-DO").html("Cегодня с : "+alarmS_TO[TO-1]+" до : "+alarmS_DO[DO-1])
			} else if ($("select#week").val() != 7) {
				$(".TO-DO").html("Сегодня нет пар")
				$("#week_day").html("")
			}
			if($("select#week").val() == 7){
				$(".TO-DO").html("")
			}
			
		};

		$(document).ready(function (){

			$("but-alarm_text").on("click", function(){

			})

			$("select.list").on("click", function(){

				if ($(this).hasClass("op-sel")){
					if($("input.status").val() == "0")
					{
						$.ajax({
							url:"request.php",
							type:"POST",
							data: { 
								status: $("input.status").val(),
								group: $("select.list").val(),
								week: $("select#week").val()
							} ,
							datatype: "json",
							success: funcSeccess
						});
					}else
					{
						$.ajax({
							url:"request.php",
							type:"POST",
							data: { 
								status: $("input.status").val(),
								teacher: $("select.list").val(),
								week: $("select#week").val()
							} ,
							datatype: "json",
							success: funcSeccess
						});
					}
					$("select.list").removeClass("open");
					$(this).removeClass("op-sel");
				} 
				else 
				{
					$(this).addClass("op-sel");
				}
			});

			$("select#week").on("click", function(){
				
				if ($(this).hasClass("op-sel")){
					if($("input.status").val() == "0"){
						$.ajax({
							url:"request.php",
							type:"POST",
							data: { 
								status: $("input.status").val(),
								group: $("select.list").val(),
								week: $("select#week").val()
							} ,
							datatype: "json",
							success: funcSeccess
						});
					}else{
						$.ajax({
							url:"request.php",
							type:"POST",
							data: { 
								status: $("input.status").val(),
								teacher: $("select.list").val(),
								week: $("select#week").val()
							} ,
							datatype: "json",
							success: funcSeccess
						});
					}
					$("select[name='groups']").removeClass("open");
					$(this).removeClass("op-sel");
				} 
				else 
				{
					$(this).addClass("op-sel");
				}
			});

			$("div.status input.status").on("click",function(){

				$.ajax({
					url:"list_request.php",
					type:"POST",
					data: {
						status: $("input.status").val()
					},
					datatype:"json",
					success: funcList
				});

				if ($("input.status").val() == "0") {
					$("input.status").val("1");
					$.ajax({
						url:"request.php",
						type:"POST",
						data: {
							status: $("input.status").val(),
							teacher: $("select.list").val(),
							week: $("select#week").val()
						} ,
						datatype: "json",
						success: funcSeccess
					});
					$("label#status").html("Преподаватель:");
					$(".table_of_contents").children("th:nth-child(3)").html("Группа");
				}else{
					$("input.status").val("0");
					$.ajax({
						url:"request.php",
						type:"POST",
						data: {
							status: $("input.status").val(),
							group: $("select.list").val(),
							week: $("select#week").val()
						} ,
						datatype: "json",
						success: funcSeccess
					});
					$("label#status").html("Группа:");
					$(".table_of_contents").children("th:nth-child(3)").html("Преподаватель");
				}
			});



		});
	</script>

	<!--End JavaScript (Jquery)!-->

</head>
<body>	
	<h1>Расписание КЦПТ</h1>
	<?php 
		// include "button/button.php";
	?>
	<form name="ginerat"  action="" method="post">
	<label>Статус:</label><br><br>
	<div class="status">
		<input type="checkbox" class="status" value = "0" >
		<div><span class="slide"></span></div>
	</div>
	<div class="but-alarm">
		<div class="but-alarm_text">Звонки</div>
		<div class="but-alarm_cont"><table class="content"><tr><th>Понеденельник-<br>Пятница</th><th>Суббота</th></tr></table></div>
	</div>

<?php 

	$query_groups = "SELECT groups.name FROM groups;";

	$result_groups = mysqli_query($link,$query_groups) 
	or die("ошибка ".mysqli_connect_error($link));

	

	$rows_groups  = mysqli_num_rows($result_groups);
 	echo "<label id=\"status\" style=\"display: inline-block; width: 85px\">Группа:</label><br>";
	echo "<select name='groups' class= 'list' id='groups'>";

	for ($g = 1;$g<$rows_groups+1;++$g){
		$row_groups = mysqli_fetch_row($result_groups);
		echo "<option ";
		if ($g == 1){echo "selected";}
		echo " value = \"".$g."\">";
		echo "<a href =\"#\">".$row_groups[0]."</a>";
		echo "</option>";
	}
	mysqli_free_result($result_groups);
	echo "</select><br><br>";


	$query_week = "SELECT week.name FROM week;";

	$result_week = mysqli_query($link,$query_week) 
	or die("ошибка ".mysqli_connect_error($link));
	$rows_week  = mysqli_num_rows($result_week);

	echo "<label style=\"display: inline-block; width: 125px\">День недели:</label><br>";
	echo "<select name='week' id='week' value = '".$day_id."'>";
	for ($g = 1;$g<$rows_week+1;++$g){
		$row_week = mysqli_fetch_row($result_week);
		echo "<option value = \"".$g."\"><a href =\"#\">".$row_week[0]."</a></option>";
	}
	echo "<option value='7'>Неделя</option>";
	mysqli_free_result($result_week);
	echo "</select><br>";
?>
	</form>
	<hr>
<?php 
	///Зависимость от списка "Группа" и вывод группы на экран
	// 	if($_POST["teacher"] === "0")
	// 		{
	// 			$query_teachers = "SELECT teachers.name FROM teachers WHERE (teachers.id = '".$teachers_id_num."');";

	// 			$result_teachers = mysqli_query($link,$query_teachers) 
	// 			or die("ошибка ".mysqli_connect_error($link));

	// 			$row_teachers = mysqli_fetch_row($result_teachers);
	// 			echo $row_teachers[0]."<br>";	
	// 	}else{
	// 			$query_groups = "SELECT groups.name FROM groups WHERE (groups.id = '".$groups_id."');";

	// 			$result_groups = mysqli_query($link,$query_groups) 
	// 			or die("ошибка ".mysqli_connect_error($link));

	// 			$row_groups = mysqli_fetch_row($result_groups);
	// 			echo $row_groups[0]."<br>";
	// 	}	
	// ///Зависимость от списка "Дни недели" и вывод дня недели на экран
	// 			$query_week = "SELECT week.name FROM week WHERE (week.id = '".$day_id."');";

	// 			$result_week = mysqli_query($link,$query_week) 
	// 			or die("ошибка ".mysqli_connect_error($link));

	// 			$row_week = mysqli_fetch_row($result_week);
	// 			echo $row_week[0];
	////Таблица(Генератор)
 // 	if($_POST["teacher"] === "1")
 // 	{
	// 	$teacher_name = "SELECT * FROM timetable WHERE (timetable.teacher = '".$teachers_id_num."'".$query_add.") ORDER BY timetable.number;";
	// 	$teacher = mysqli_query($link, $teacher_name)
	// 	or die("ошибка2 ".mysqli_connect_error($link));
	// 	if ($teacher)
	// 	{
	// 		if($day_id != 7)
	// 		{
	// 			$teacher_rows = mysqli_num_rows($teacher);
	// 			if($teacher_rows != 0)
	// 			{
	// 				echo "<table><th>Урок</th><th>Группа</th><th>Название предмета</th><th>Каб</th>";
	// 				for($r = 0;$r<$teacher_rows;++$r)
	// 				{
	// 					$teacher_row = mysqli_fetch_row($teacher);
	// 					echo "<tr>";
	// 					for ($j = 3; $j < 7 ; ++$j) 
	// 					{
	// 						$k = $teacher_row[$j];
	// 						settype($k, "integer");
							
	// 						if ($j == 3) 		///Номер пары
	// 						{
	// 							echo "<td>".$teacher_row[3]."</td>";
	// 						}
	// 						if ($j == 4) 		///Урок
	// 						{	
	// 							$k = $teacher_row[1];
	// 							settype($k, "integer");
	// 							$query_groups = "SELECT groups.name FROM groups WHERE (groups.id = '".$k."');";     	///Запрос в таблицу groups(Название группы)
	// 							$result_groups = mysqli_query($link,$query_groups) 
	// 							or die("ошибка ".mysqli_connect_error($link));
	// 							$row_groups = mysqli_fetch_row($result_groups);
								
	// 							echo "<td>".$row_groups[0]."</td>";
	// 						}
	// 						if ($j == 5) 		///Урок
	// 						{	
	// 							$k = $teacher_row[4];
	// 							settype($k, "integer");
	// 							$query_lessons = "SELECT * FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
	// 							$result_lessons = mysqli_query($link,$query_lessons) 
	// 							or die("ошибка ".mysqli_connect_error($link));
	// 							$row_lessons = mysqli_fetch_row($result_lessons);
								
	// 							echo "<td>".$row_lessons[1]."</td>";
	// 						}
	// 						if ($j == 6)		///Кабинет
	// 						{
	// 							$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
	// 							$result_rooms = mysqli_query($link,$query_rooms) 
	// 							or die("ошибка ".mysqli_connect_error($link));
	// 							$row_rooms = mysqli_fetch_row($result_rooms);
			
	// 							echo "<td>".$row_rooms[0]."</td>";
	// 						}
	// 					}
	// 					echo "</tr>";	
	// 				}
	// 				echo "</table>";
	// 			}
	// 			else
	// 			{
	// 				echo "<br>Пар нет";
	// 			}
	// 		}
	// 		else
	// 		{	
	// 			for($t = 1;$t<$day_id;$t++)
	// 			{
	// 				$query_week = "SELECT week.name FROM week WHERE (week.id = '".$t."');";

	// 				$result_week = mysqli_query($link,$query_week) 
	// 				or die("ошибка ".mysqli_connect_error($link));

	// 				$row_week = mysqli_fetch_row($result_week);
	// 				echo $row_week[0];
	// 				//день недели выше
	// 				SELECT timetable.number,lessons.name,teachers.name,rooms.name FROM timetable,rooms,teachers,lessons WHERE (timetable.teacher = '1' AND timetable.day = '1') ORDER BY timetable.number;
					// $teacher_name = "SELECT * FROM timetable WHERE (timetable.teacher = '".$teachers_id_num."' AND timetable.day = '".$t."') ORDER BY timetable.number;";
	// 				$teacher = mysqli_query($link, $teacher_name)
	// 				or die("ошибка2 ".mysqli_connect_error($link));
	// 				$teacher_rows = mysqli_num_rows($teacher);///музей имени Словцова
	// 				if($teacher_rows != 0)
	// 				{
	// 					echo "<table><th>Урок</th><th>Группа</th><th>Название предмета</th><th>Каб</th>";
	// 					for($r = 0;$r<$teacher_rows;++$r)
	// 					{
	// 						$teacher_row = mysqli_fetch_row($teacher);
	// 						echo "<tr>";
	// 						for ($j = 3; $j < 7 ; ++$j) 
	// 						{
	// 							$k = $teacher_row[$j];
	// 							settype($k, "integer");
						
	// 							if ($j == 3) 		///Номер пары
	// 							{
	// 								echo "<td>".$teacher_row[3]."</td>";
	// 							}
	// 							if ($j == 4) 		///Урок
	// 							{	
	// 								$k = $teacher_row[1];
	// 								settype($k, "integer");
	// 								$query_groups = "SELECT groups.name FROM groups WHERE (groups.id = '".$k."');";     	///Запрос в таблицу groups(Название группы)
	// 								$result_groups = mysqli_query($link,$query_groups) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_groups = mysqli_fetch_row($result_groups);
							
	// 								echo "<td>".$row_groups[0]."</td>";
	// 							}
	// 							if ($j == 5) 		///Урок
	// 							{	
	// 								$k = $teacher_row[4];
	// 								settype($k, "integer");
	// 								$query_lessons = "SELECT * FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
	// 								$result_lessons = mysqli_query($link,$query_lessons) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_lessons = mysqli_fetch_row($result_lessons);
	// 								echo "<td>".$row_lessons[1]."</td>";
	// 							}
	// 							if ($j == 6)		///Кабинет
	// 							{
	// 								$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
	// 								$result_rooms = mysqli_query($link,$query_rooms) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_rooms = mysqli_fetch_row($result_rooms);
	// 								echo "<td>".$row_rooms[0]."</td>";
	// 							}
	// 						}
	// 						echo "</tr>";
	// 					}
	// 					echo "</table><hr>";
	// 				}
	// 				else
	// 				{
	// 					echo "<br>Пар нет<hr>";
	// 				}
	// 			}
	// 		}
	// 	}
	// }
	// else
	// {	
	// 	if($day_id != 7)
	// 	{
	// 			$query = "SELECT * FROM timetable WHERE (groupname = '".$groups_id."' AND day = ".$day_id." ) ;";   ///Запрос в таблицу timetable(структура расписания)
	// 			$result = mysqli_query($link,$query) 
	// 			or die("ошибка ".mysqli_connect_error($link));
	// 			if ($result)
	// 			{
	// 				$rows = mysqli_num_rows($result);
	// 				if($rows != 0)
	// 				{
	// 					echo "<table><th>Урок</th><th>Название предмета</th><th>Преподаватель</th><th>Каб</th>";
	// 					$result_check = false;
	// 					for ($i = 0;$i<$rows;++$i)
	// 					{
	// 						$row = mysqli_fetch_row($result);
	// 						echo "<tr>";
	// 						for ($j = 3; $j < 7 ; ++$j) 
	// 						{
	// 							$k = $row[$j];
	// 							settype($k, "integer");
	// 							if ($j == 3) 		///Номер пары
	// 							{
	// 								echo "<td>".$row[$j]."</td>";
	// 							}
	// 							if ($j == 4) 		///Урок
	// 							{
	// 								$query_lessons = "SELECT lessons.name FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
	// 								$result_lessons = mysqli_query($link,$query_lessons) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_lessons = mysqli_fetch_row($result_lessons);
	// 								echo "<td>".$row_lessons[0]."</td>";
	// 							}
	// 							if ($j == 5) 		///Преподаватель
	// 							{
	// 								$query_teachers = "SELECT teachers.name FROM teachers WHERE (teachers.id = '".$k."');";	///Запрос в таблицу teachers(ФИО Преподавателя)
	// 								$result_teachers = mysqli_query($link,$query_teachers) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_teachers = mysqli_fetch_row($result_teachers);
	// 								echo "<td>".$row_teachers[0]."</td>";
	// 							}
	// 							if ($j == 6)		///Кабинет
	// 							{
	// 								$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
	// 								$result_rooms = mysqli_query($link,$query_rooms) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_rooms = mysqli_fetch_row($result_rooms);
	// 								echo "<td>".$row_rooms[0]."</td>";
	// 							}
	// 						}
	// 						echo "</tr>";
	// 					}
	// 					echo "</table>";
	// 					mysqli_free_result($result);
	// 				}
	// 				else
	// 				{
	// 					echo "<br>Пар нет";
	// 				}
	// 			}
	// 	}
	// 	else
	// 	{	
	// 		for($t = 1;$t<$day_id;$t++)
	// 		{	
	// 			$query_week = "SELECT week.name FROM week WHERE (week.id = '".$t."');";
	// 			$result_week = mysqli_query($link,$query_week) 
	// 			or die("ошибка ".mysqli_connect_error($link));
	// 			$row_week = mysqli_fetch_row($result_week);
	// 			echo $row_week[0];
	// 			//день недели выше
	// 			$query = "SELECT * FROM timetable WHERE (groupname = '".$groups_id."' AND day = ".$t." ) ;";   ///Запрос в таблицу timetable(структура расписания)
	// 			$result = mysqli_query($link,$query) 
	// 			or die("ошибка ".mysqli_connect_error($link));
	// 			if ($result)
	// 			{
	// 				$rows = mysqli_num_rows($result);
	// 				if($rows != 0)
	// 				{
	// 					echo "<table><th>Урок</th><th>Название предмета</th><th>Преподаватель</th><th>Каб</th>";
	// 					$result_check = false;
	// 					for ($i = 0;$i<$rows;++$i)
	// 					{
	// 						$row = mysqli_fetch_row($result);
	// 						echo "<tr>";
	// 						for ($j = 3; $j < 7 ; ++$j) 
	// 						{
	// 							$k = $row[$j];
	// 							settype($k, "integer");
	// 							if ($j == 3) 		///Номер пары
	// 							{
	// 								echo "<td>".$row[$j]."</td>";
	// 							}
	// 							if ($j == 4) 		///Урок
	// 							{
	// 								$query_lessons = "SELECT lessons.name FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
	// 								$result_lessons = mysqli_query($link,$query_lessons) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_lessons = mysqli_fetch_row($result_lessons);
	// 								echo "<td>".$row_lessons[0]."</td>";
	// 							}
	// 							if ($j == 5) 		///Преподаватель
	// 							{
	// 								$query_teachers = "SELECT teachers.name FROM teachers WHERE (teachers.id = '".$k."');";	///Запрос в таблицу teachers(ФИО Преподавателя)
	// 								$result_teachers = mysqli_query($link,$query_teachers) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_teachers = mysqli_fetch_row($result_teachers);
	// 								echo "<td>".$row_teachers[0]."</td>";
	// 							}
	// 							if ($j == 6)		///Кабинет
	// 							{
	// 								$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
	// 								$result_rooms = mysqli_query($link,$query_rooms) 
	// 								or die("ошибка ".mysqli_connect_error($link));
	// 								$row_rooms = mysqli_fetch_row($result_rooms);
	// 								echo "<td>".$row_rooms[0]."</td>";
	// 							}
	// 						}
	// 						echo "</tr>";
	// 					}
	// 					echo "</table><hr>";
	// 					mysqli_free_result($result);
	// 				}
	// 				else
	// 				{
	// 					echo "<br>Пар нет<hr>";
	// 				}
	// 			}
	// 		}	
	// 	}
	// }
	// 

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
</body>
</html>