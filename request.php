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
	$group = $_POST["group"];
	$week = $_POST["week"];
	
	$answer = array(array("number"=>"1","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"2","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"3","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"4","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"5","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"6","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"7","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"8","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"9","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"10","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"11","lesson"=>"","teacher"=>"","room"=>""),array("number"=>"12","lesson"=>"","teacher"=>"","room"=>""));



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

	// if(){

	// }else{

	// }



	// if($day_id != '7')
	// 	{
	// 		$query_add = " AND timetable.day = '".$day_id."'";
	// 	}else{
	// 		$query_add = "";
	// 	}
	

	$timetable_q = "SELECT timetable.number,lessons.name ,teachers.name ,rooms.name FROM timetable INNER JOIN lessons ON timetable.lesson = lessons.id INNER JOIN teachers ON timetable.teacher = teachers.id INNER JOIN rooms ON timetable.room = rooms.id WHERE (timetable.groupname = '".$group."' AND timetable.day = '".$week."') ORDER BY timetable.number;";


	$timetable = mysqli_query($link, $timetable_q) or die ("ошибка2 ".mysqli_connect_error($link));
	$repeat = 0;
	$rows = mysqli_num_rows($timetable);
	for ($i=0; $i < $rows ; $i++) { 
		$row = mysqli_fetch_row($timetable);
		for ($j = 0; $j <13 ; $i++){
			if (($row[0] == $answer[$i]["number"]) and ((int)$row[0] != $repeat )){
				$answer[$i]["number"] = $row[0];
				$answer[$i]["lesson"] = $row[1];
				$answer[$i]["teacher"] = $row[2];
				$answer[$i]["room"] = $row[3];	
				$repeat = $row[0];
			}/*else if ($row[0] == $repeat) {

			}*/
		}
	}


	mysqli_close($link);

///==================================================================================================================================================================
///
///  Отправка массива
///  
///==================================================================================================================================================================

	echo json_encode($answer);

 ?>