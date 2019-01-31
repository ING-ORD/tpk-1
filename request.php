<?php  
///==================================================================================================================================================================
///		ОГЛАВЛЕНИЕ:
///  	
///  	1)Получене данных
///		2)Генератор{Выборка элементов таблицы в массив}
///		3)Отправка массива
///  
///==================================================================================================================================================================

function addChangeGroupDay(array $answer,array $change_bd, $i){ #$answer - основное расписание, $change_bd - изменения которые дополнят БД, $i - счетчик длины(каждый раз меняется)
	if($change_bd[$i][1] == "Замена"){
		$answer[((integer)$change_bd[$i][0])-1]["lesson"] = $change_bd[$i][2];
		$answer[((integer)$change_bd[$i][0])-1]["list"] = $change_bd[$i][3];
		$answer[((integer)$change_bd[$i][0])-1]["room"] = $change_bd[$i][4];
	}else if ($change_bd[$i][1] == "Будет"){
		$answer[((integer)$change_bd[$i][0])-1]["lesson"] = $change_bd[$i][2];
		$answer[((integer)$change_bd[$i][0])-1]["list"] = $change_bd[$i][3];
		$answer[((integer)$change_bd[$i][0])-1]["room"] = $change_bd[$i][4];
	}else if ($change_bd[$i][1] == "Отмена"){
		$answer[((integer)$change_bd[$i][0])-1]["lesson"] = "";
		$answer[((integer)$change_bd[$i][0])-1]["list"] = "";
		$answer[((integer)$change_bd[$i][0])-1]["room"] = "";
	}else if ($change_bd[$i][1] == "Замена преподавателя"){
		$answer[((integer)$change_bd[$i][0])-1]["list"] = $change_bd[$i][3];
	}
	return $answer;
}

function addChangeGroupWeek(array $answer,array $change_bd, $i){
	if($change_bd[$i][1] == "Замена"){
		$answer[((integer)$change_bd[$i][0])-1][(integer)$change_bd[$i][5]]["lessonList"] = $change_bd[$i][2]."(".$change_bd[$i][3].")";
		$answer[((integer)$change_bd[$i][0])-1][(integer)$change_bd[$i][5]]["room"] = $change_bd[$i][4];
	}else if ($change_bd[$i][1] == "Будет"){
		$answer[((integer)$change_bd[$i][0])-1][(integer)$change_bd[$i][5]]["lessonList"] = $change_bd[$i][2]."(".$change_bd[$i][3].")";
		$answer[((integer)$change_bd[$i][0])-1][(integer)$change_bd[$i][5]]["room"] = $change_bd[$i][4];
	}else if ($change_bd[$i][1] == "Отмена"){
		$answer[((integer)$change_bd[$i][0])-1][(integer)$change_bd[$i][5]]["lessonList"] = "";
		$answer[((integer)$change_bd[$i][0])-1][(integer)$change_bd[$i][5]]["room"] = "";
	}else if ($change_bd[$i][1] == "Замена преподавателя"){
		$answer[((integer)$change_bd[$i][0])-1][(integer)$change_bd[$i][5]]["lessonList"] = $change_bd[$i][3]."(".$change_bd[$i][4].")";
	}
	return $answer;
}

///==================================================================================================================================================================
///
///  Получене данных
///  
///==================================================================================================================================================================

	$status = $_POST["status"];
	$change = $_POST["change"];
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
	$answer_add;
	$change_bd = array(
		array("1","Замена","Мой предмет_Замена","Я","312","1"),
		array("11","Будет","Мой предмет_Будет","Я","415","2"),
		array("3","Отмена","Предмета не будет","Я","","3"),
		array("2","Замена преподавателя","Мой предмет_с другим преподавателем","Я","221","5")
	);


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

	if ($change == 1) {
		if($week != 7){
			if ($status == 0) {
				for ($i=0; $i < count($change_bd); $i++) { 
					$answer = addChangeGroupDay($answer, $change_bd, $i);
				}
			}else{
				#code...
			}
		}else{
			if ($status == 0) {
				for ($i=0; $i < count($change_bd) ; $i++) { 
					$answer = addChangeGroupWeek($answer, $change_bd, $i);
				}
			}else{
				#code...
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