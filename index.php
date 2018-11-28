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
	$dump_id = array();

	
	for ($t = 0;$t<$teacher_rows_id; ++$t){
		$teacher_row_id = mysqli_fetch_row($teacher_id);
		//var_dump($teacher_row_id[0]);
		array_push($dump_id,$teacher_row_id[0]);
		//var_dump($dump_id);
	}
	array_multisort($dump_id);
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Расписание КЦПТ</title>
	<link rel="stylesheet" href="Style.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>

	<script type="text/javascript">
		
		function funcSeccess(data){
			//var answer = JSON.parse(data);
			alert(data);
		};

		$(document).ready(function (){
			$("select[name='groups']").bind("click", function(){
				$.ajax({
					url:"request.php",
					type:"POST",
					data: { 
						status: $("input[name='teacher']").val(),
						group: $("select[name='groups']").val(),
						week: $("select[name='week']").val()
					} ,
					datatype: "html",
					success: funcSeccess
				});
				$
			});

			$("select[name='groups'].check_sel").bind("click", function(){
				$("select[name='groups'].check_sel").remuve
			});

			$(".checkbox-btn").bind("click",function(){

				$.ajax({
					url:"request.php",
					type:"POST",
					data: {
						status: $("input[name='teacher']").val(),
						group: $("select[name='groups']").val(),
						week: $("select[name='week']").val()
					} ,
					datatype: "html",
					success: funcSeccess
				});

				if ($("input[name='teacher']").val() == "1") {
					$("input[name='teacher']").val("0");
				}else{
					$("input[name='teacher']").val("1");
				}
			});
		});
	</script>
</head>
<body>	
	<h1>Расписание КЦПТ</h1>
	<form name="ginerat"  action="" method="post">
	<label>Статус:</label><br><br>
	<div class="checkbox-btn">
		<input type="checkbox" name="teacher" value = "1" <?php if(isset($_POST["teacher"])){echo "checked =\"\" ";} ?>>
		<div><span class="slide"></span></div>
	</div>

<?php 
	///----------------------------------------------------------------------
	if ($_POST["teacher"] == '1') {
		$query_teacher = "SELECT teachers.name FROM teachers;";

		$result_teacher = mysqli_query($link,$query_teacher) 
		or die("ошибка ".mysqli_connect_error($link));
		$rows_teacher  = mysqli_num_rows($result_teacher);
		
 		echo "<label style=\"display: inline-block; width: 85px\">Группа:</label><br>";
		echo "<select name='teacher_id' id='teacher_id' value = '".$teachers_id."'>";

		for ($g = 1;$g<$rows_teacher+1;++$g){
			$row_teacher = mysqli_fetch_row($result_teacher);

			for ($l = 0;$l < 1;++$l){
				echo "<option ";
				if ($_POST["teacher_id"] == $g){echo "selected='".$_POST["teacher_id"]."'";}
				echo "value = \"".$g."\">";
				echo "<a href =\"#\">".$row_teacher[$l]."</a>";
			}
			echo "</option>";
		}
		mysqli_free_result($result_teacher);
		echo "</select><br><br>";

	} else {
	
		$query_groups = "SELECT groups.name FROM groups;";
	
		$result_groups = mysqli_query($link,$query_groups) 
		or die("ошибка ".mysqli_connect_error($link));
	
		
	
		$rows_groups  = mysqli_num_rows($result_groups);
	 	echo "<label style=\"display: inline-block; width: 85px\">Группа:</label><br>";
		echo "<select name='groups' class= 'check_sel' autofocus='' id='groups' value = '".$day_id."'>";
	
		for ($g = 1;$g<$rows_groups+1;++$g){
			$row_groups = mysqli_fetch_row($result_groups);
	
			for ($l = 0;$l < 1;++$l){
				echo "<option ";
				if ($_POST["groups"] == $g){echo "selected='".$_POST["groups"]."'";}
				echo " value = \"".$g."\">";
				echo "<a href =\"#\">".$row_groups[$l]."</a>";
			}
			echo "</option>";
		}
		mysqli_free_result($result_groups);
		echo "</select><br><br>";
	}
	///----------------------------------------------------------------

	$query_week = "SELECT week.name FROM week;";

	$result_week = mysqli_query($link,$query_week) 
	or die("ошибка ".mysqli_connect_error($link));
	$rows_week  = mysqli_num_rows($result_week);

	echo "<label style=\"display: inline-block; width: 125px\">День недели:</label><br>";
	echo "<select name='week' id='week' value = '".$day_id."'>";
	for ($g = 1;$g<$rows_week+1;++$g){
		$row_week = mysqli_fetch_row($result_week);

		for ($l = 0;$l < 1;++$l){
		echo "<option ";
		if ($_POST["week"] == $g){echo "selected='".$_POST["week"]."'";}
		echo " value = \"".$g."\">";
		echo "<a href =\"#\">".$row_week[$l]."</a>";
		}
		echo "</option>";
	}
	echo "<option ";
	if ($_POST["week"] == '7'){echo "selected='".$_POST["week"]."'";}
	echo " value='7'>Неделя</option>";
	mysqli_free_result($result_week);
	echo "</select><br>";
	///-----------------------------------------------------------------
	echo "<input type='submit' name='send' value='поиск'>";
	
		 ?>
	</form>
	<hr>
<?php 
///Зависимость от списка "Группа" и вывод группы на экран
	if($_POST["teacher"] === "1")
		{
			$query_teachers = "SELECT teachers.name FROM teachers WHERE (teachers.id = '".$teachers_id_num."');";

			$result_teachers = mysqli_query($link,$query_teachers) 
			or die("ошибка ".mysqli_connect_error($link));

			$row_teachers = mysqli_fetch_row($result_teachers);
			echo $row_teachers[0]."<br>";	
	}else{
			$query_groups = "SELECT groups.name FROM groups WHERE (groups.id = '".$groups_id."');";

			$result_groups = mysqli_query($link,$query_groups) 
			or die("ошибка ".mysqli_connect_error($link));

			$row_groups = mysqli_fetch_row($result_groups);
			echo $row_groups[0]."<br>";
	}	
///Зависимость от списка "Дни недели" и вывод дня недели на экран
			$query_week = "SELECT week.name FROM week WHERE (week.id = '".$day_id."');";

			$result_week = mysqli_query($link,$query_week) 
			or die("ошибка ".mysqli_connect_error($link));

			$row_week = mysqli_fetch_row($result_week);
			echo $row_week[0];
////Таблица(Генератор)
 	if($_POST["teacher"] === "1")
 	{
		$teacher_name = "SELECT * FROM timetable WHERE (timetable.teacher = '".$teachers_id_num."'".$query_add.") ORDER BY timetable.number;";
		$teacher = mysqli_query($link, $teacher_name)
		or die("ошибка2 ".mysqli_connect_error($link));
		if ($teacher)
		{
			if($day_id != 7)
			{
				$teacher_rows = mysqli_num_rows($teacher);
				if($teacher_rows != 0)
				{
					echo "<table><th>Урок</th><th>Группа</th><th>Название предмета</th><th>Каб</th>";
					for($r = 0;$r<$teacher_rows;++$r)
					{
						$teacher_row = mysqli_fetch_row($teacher);
						echo "<tr>";
						for ($j = 3; $j < 7 ; ++$j) 
						{
							$k = $teacher_row[$j];
							settype($k, "integer");
							
							if ($j == 3) 		///Номер пары
							{
								echo "<td>".$teacher_row[3]."</td>";
							}
							if ($j == 4) 		///Урок
							{	
								$k = $teacher_row[1];
								settype($k, "integer");
								$query_groups = "SELECT groups.name FROM groups WHERE (groups.id = '".$k."');";     	///Запрос в таблицу groups(Название группы)
								$result_groups = mysqli_query($link,$query_groups) 
								or die("ошибка ".mysqli_connect_error($link));
								$row_groups = mysqli_fetch_row($result_groups);
								
								echo "<td>".$row_groups[0]."</td>";
							}
							if ($j == 5) 		///Урок
							{	
								$k = $teacher_row[4];
								settype($k, "integer");
								$query_lessons = "SELECT * FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
								$result_lessons = mysqli_query($link,$query_lessons) 
								or die("ошибка ".mysqli_connect_error($link));
								$row_lessons = mysqli_fetch_row($result_lessons);
								
								echo "<td>".$row_lessons[1]."</td>";
							}
							if ($j == 6)		///Кабинет
							{
								$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
								$result_rooms = mysqli_query($link,$query_rooms) 
								or die("ошибка ".mysqli_connect_error($link));
								$row_rooms = mysqli_fetch_row($result_rooms);
			
								echo "<td>".$row_rooms[0]."</td>";
							}
						}
						echo "</tr>";	
					}
					echo "</table>";
				}
				else
				{
					echo "<br>Пар нет";
				}
			}
			else
			{	
				for($t = 1;$t<$day_id;$t++)
				{
					$query_week = "SELECT week.name FROM week WHERE (week.id = '".$t."');";

					$result_week = mysqli_query($link,$query_week) 
					or die("ошибка ".mysqli_connect_error($link));

					$row_week = mysqli_fetch_row($result_week);
					echo $row_week[0];
					//день недели выше
					$teacher_name = "SELECT * FROM timetable WHERE (timetable.teacher = '".$teachers_id_num."' AND timetable.day = '".$t."') ORDER BY timetable.number;";
					$teacher = mysqli_query($link, $teacher_name)
					or die("ошибка2 ".mysqli_connect_error($link));
					$teacher_rows = mysqli_num_rows($teacher);///музей имени Словцова
					if($teacher_rows != 0)
					{
						echo "<table><th>Урок</th><th>Группа</th><th>Название предмета</th><th>Каб</th>";
						for($r = 0;$r<$teacher_rows;++$r)
						{
							$teacher_row = mysqli_fetch_row($teacher);
							echo "<tr>";
							for ($j = 3; $j < 7 ; ++$j) 
							{
								$k = $teacher_row[$j];
								settype($k, "integer");
						
								if ($j == 3) 		///Номер пары
								{
									echo "<td>".$teacher_row[3]."</td>";
								}
								if ($j == 4) 		///Урок
								{	
									$k = $teacher_row[1];
									settype($k, "integer");
									$query_groups = "SELECT groups.name FROM groups WHERE (groups.id = '".$k."');";     	///Запрос в таблицу groups(Название группы)
									$result_groups = mysqli_query($link,$query_groups) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_groups = mysqli_fetch_row($result_groups);
							
									echo "<td>".$row_groups[0]."</td>";
								}
								if ($j == 5) 		///Урок
								{	
									$k = $teacher_row[4];
									settype($k, "integer");
									$query_lessons = "SELECT * FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
									$result_lessons = mysqli_query($link,$query_lessons) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_lessons = mysqli_fetch_row($result_lessons);
									echo "<td>".$row_lessons[1]."</td>";
								}
								if ($j == 6)		///Кабинет
								{
									$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
									$result_rooms = mysqli_query($link,$query_rooms) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_rooms = mysqli_fetch_row($result_rooms);
									echo "<td>".$row_rooms[0]."</td>";
								}
							}
							echo "</tr>";
						}
						echo "</table><hr>";
					}
					else
					{
						echo "<br>Пар нет<hr>";
					}
				}
			}
		}
	}
	else
	{	
		if($day_id != 7)
		{
				$query = "SELECT * FROM timetable WHERE (groupname = '".$groups_id."' AND day = ".$day_id." ) ;";   ///Запрос в таблицу timetable(структура расписания)
				$result = mysqli_query($link,$query) 
				or die("ошибка ".mysqli_connect_error($link));
				if ($result)
				{
					$rows = mysqli_num_rows($result);
					if($rows != 0)
					{
						echo "<table><th>Урок</th><th>Название предмета</th><th>Преподаватель</th><th>Каб</th>";
						$result_check = false;
						for ($i = 0;$i<$rows;++$i)
						{
							$row = mysqli_fetch_row($result);
							echo "<tr>";
							for ($j = 3; $j < 7 ; ++$j) 
							{
								$k = $row[$j];
								settype($k, "integer");
								if ($j == 3) 		///Номер пары
								{
									echo "<td>".$row[$j]."</td>";
								}
								if ($j == 4) 		///Урок
								{
									$query_lessons = "SELECT lessons.name FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
									$result_lessons = mysqli_query($link,$query_lessons) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_lessons = mysqli_fetch_row($result_lessons);
									echo "<td>".$row_lessons[0]."</td>";
								}
								if ($j == 5) 		///Преподаватель
								{
									$query_teachers = "SELECT teachers.name FROM teachers WHERE (teachers.id = '".$k."');";	///Запрос в таблицу teachers(ФИО Преподавателя)
									$result_teachers = mysqli_query($link,$query_teachers) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_teachers = mysqli_fetch_row($result_teachers);
									echo "<td>".$row_teachers[0]."</td>";
								}
								if ($j == 6)		///Кабинет
								{
									$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
									$result_rooms = mysqli_query($link,$query_rooms) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_rooms = mysqli_fetch_row($result_rooms);
									echo "<td>".$row_rooms[0]."</td>";
								}
							}
							echo "</tr>";
						}
						echo "</table>";
						mysqli_free_result($result);
					}
					else
					{
						echo "<br>Пар нет";
					}
				}
		}
		else
		{	
			for($t = 1;$t<$day_id;$t++)
			{	
				$query_week = "SELECT week.name FROM week WHERE (week.id = '".$t."');";
				$result_week = mysqli_query($link,$query_week) 
				or die("ошибка ".mysqli_connect_error($link));
				$row_week = mysqli_fetch_row($result_week);
				echo $row_week[0];
				//день недели выше
				$query = "SELECT * FROM timetable WHERE (groupname = '".$groups_id."' AND day = ".$t." ) ;";   ///Запрос в таблицу timetable(структура расписания)
				$result = mysqli_query($link,$query) 
				or die("ошибка ".mysqli_connect_error($link));
				if ($result)
				{
					$rows = mysqli_num_rows($result);
					if($rows != 0)
					{
						echo "<table><th>Урок</th><th>Название предмета</th><th>Преподаватель</th><th>Каб</th>";
						$result_check = false;
						for ($i = 0;$i<$rows;++$i)
						{
							$row = mysqli_fetch_row($result);
							echo "<tr>";
							for ($j = 3; $j < 7 ; ++$j) 
							{
								$k = $row[$j];
								settype($k, "integer");
								if ($j == 3) 		///Номер пары
								{
									echo "<td>".$row[$j]."</td>";
								}
								if ($j == 4) 		///Урок
								{
									$query_lessons = "SELECT lessons.name FROM lessons WHERE (lessons.id = '".$k."');";     	///Запрос в таблицу lessons(Название урока)
									$result_lessons = mysqli_query($link,$query_lessons) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_lessons = mysqli_fetch_row($result_lessons);
									echo "<td>".$row_lessons[0]."</td>";
								}
								if ($j == 5) 		///Преподаватель
								{
									$query_teachers = "SELECT teachers.name FROM teachers WHERE (teachers.id = '".$k."');";	///Запрос в таблицу teachers(ФИО Преподавателя)
									$result_teachers = mysqli_query($link,$query_teachers) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_teachers = mysqli_fetch_row($result_teachers);
									echo "<td>".$row_teachers[0]."</td>";
								}
								if ($j == 6)		///Кабинет
								{
									$query_rooms = "SELECT rooms.name FROM rooms WHERE (rooms.id = '".$k."');";  					///Запрос в таблицу rooms(Кабинет)
									$result_rooms = mysqli_query($link,$query_rooms) 
									or die("ошибка ".mysqli_connect_error($link));
									$row_rooms = mysqli_fetch_row($result_rooms);
									echo "<td>".$row_rooms[0]."</td>";
								}
							}
							echo "</tr>";
						}
						echo "</table><hr>";
						mysqli_free_result($result);
					}
					else
					{
						echo "<br>Пар нет<hr>";
					}
				}
			}	
		}
	}

	mysqli_close($link);
?>
</body>
</html>