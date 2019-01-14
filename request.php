<?php  
///==================================================================================================================================================================
///		ОГЛАВЛЕНИЕ:
///  	
///  	1)Получене данных
///		2)Генератор{Выборка элементов таблицы в массив}
///		3)Отправка массива
///  
///==================================================================================================================================================================

///==================================================================================================================================================================
///
///  Получене данных
///  
///==================================================================================================================================================================

	$status = $_POST["status"];
	if ($status == 0){
		$group = $_POST["group"];
	}else{
		$teacher = $_POST["teacher"];
	}
	$week = $_POST["week"];
	if ($week != 7) {
		$answer = array(
			array("number"=>"1","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"2","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"3","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"4","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"5","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"6","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"7","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"8","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"9","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"10","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"11","lesson"=>"","list"=>"","room"=>""),
			array("number"=>"12","lesson"=>"","list"=>"","room"=>"")
		);
	}else{
		$answer = array(
			array( 
				1,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				2,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				3,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				4,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				5,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				6,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				7,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				8,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				9,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				10,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				11,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			),
			array( 
				12,
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>""),
				array("lessonList"=>"","room"=>"")
			)
		);
	}


///==================================================================================================================================================================
///
///  Основной гинератор
///  
///==================================================================================================================================================================

	$dbHost = 'localhost'; 
	$dbUser = 'root'; 
	$dbPass = ''; 
	$dbName = 'timetable'; 

	$link = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName) or die ("ошибка".mysqli_connect_error($link));

	if ($week != 7) 
	{
		if ($status == 0) 
		{
			$timetable_q = "SELECT timetable.number,lessons.name ,teachers.name ,rooms.name FROM timetable INNER JOIN lessons ON timetable.lesson = lessons.id INNER JOIN teachers ON timetable.teacher = teachers.id INNER JOIN rooms ON timetable.room = rooms.id WHERE (timetable.groupname = '".$group."' AND timetable.day = '".$week."') ORDER BY timetable.number,lessons.name;";
		}else
		{
			$timetable_q = "SELECT timetable.number,lessons.name ,groups.name ,rooms.name FROM timetable INNER JOIN lessons ON timetable.lesson = lessons.id INNER JOIN groups ON timetable.groupname = groups.id INNER JOIN rooms ON timetable.room = rooms.id WHERE (timetable.teacher = '".$teacher."' AND timetable.day = '".$week."') ORDER BY timetable.number,lessons.name;";
		}
	}
	else
	{
		if ($status == 0) 
		{
			$timetable_q = "SELECT timetable.day,timetable.number,lessons.name ,teachers.name ,rooms.name FROM timetable INNER JOIN lessons ON timetable.lesson = lessons.id INNER JOIN teachers ON timetable.teacher = teachers.id INNER JOIN rooms ON timetable.room = rooms.id WHERE (timetable.groupname = '".$group."') ORDER BY  timetable.day,timetable.number,lessons.name";
		}else
		{
			$timetable_q = "SELECT timetable.day,timetable.number,lessons.name ,groups.name ,rooms.name FROM timetable INNER JOIN lessons ON timetable.lesson = lessons.id INNER JOIN groups ON timetable.groupname = groups.id INNER JOIN rooms ON timetable.room = rooms.id WHERE (timetable.teacher = '".$teacher."') ORDER BY   timetable.day,timetable.number,lessons.name;";
		}
	}

	$timetable = mysqli_query($link, $timetable_q) or die ("ошибка2 ".mysqli_connect_error($link));
	$rows = mysqli_num_rows($timetable);
	if($week != 7){
		for ($i=0; $i < $rows; $i++) { 
			$row = mysqli_fetch_row($timetable);
			for($j = 0;$j<12;$j++){
				if($answer[(int)$row[0]-1]["lesson"] == "" and $answer[$j]["number"] == $row[0]){
					$answer[(int)$row[0]-1]["number"] = $row[0];
					$answer[(int)$row[0]-1]["lesson"] = $row[1];
					$answer[(int)$row[0]-1]["list"] = $row[2];
					$answer[(int)$row[0]-1]["room"] = $row[3];
				}else if ($answer[(int)$row[0]-1]["lesson"] != "" and $answer[$j]["number"] == $row[0]){
					// $j++;
					$answer[(int)$row[0]-1]["number"] = $row[0];
					$answer[(int)$row[0]-1]["lesson"] .= " | ".$row[1];
					$answer[(int)$row[0]-1]["list"] .= " | ".$row[2];
					$answer[(int)$row[0]-1]["room"] .= " | ".$row[3];
				}
			}
		}
	}else{
		for ($i=0; $i < $rows ; $i++) { 
			$row = mysqli_fetch_row($timetable);
			for ($j=0; $j < 12 ; $j++) {
				for ($k=1; $k < 8 ; $k++) { 
					if($answer[$j][0] == $row[1] and $k == $row[0] and ($answer[(int)$row[1]-1][$k]["lessonList"] == "")){
						$answer[$j][$k]["lessonList"] = $row[2]."<br>(".$row[3].")";
						$answer[$j][$k]["room"] = $row[4];
					}else if($answer[$j][0] == $row[1] and $k == $row[0] and  $answer[(int)$row[1]-1][$k]['lessonList'] != ""){
						$answer[$j][$k]["lessonList"] .= "|". $row[2]."<br>(".$row[3].")";
						$answer[$j][$k]["room"] .= "|". $row[4];
					}
				} 
			}
		}
	}


	mysqli_close($link);

///======================================================================================
///
///  Отправка массива
///  
///======================================================================================

	echo json_encode($answer);

 ?>