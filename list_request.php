<?php 
	
	$dbHost = 'localhost'; 
	$dbUser = 'root'; 
	$dbPass = ''; 
	$dbName = 'project'; 
	$answer = array();
	$status =$_POST["status"];

	$link = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName) or die ("ошибка".mysqli_connect_error($link));
	
	if ($status == 0) 
	{
		$timetable_q = "SELECT teacher.name FROM teacher;";
	}else
	{
		$timetable_q = "SELECT group.name FROM group;";
	}


	$timetable = mysqli_query($link, $timetable_q) or die ("ошибка2 ".mysqli_connect_error($link));

	$rows = mysqli_num_rows($timetable);
	for ($i=0; $i < $rows; $i++) { 
		$row = mysqli_fetch_row($timetable);
		array_push($answer, $row[0]);
	}
	


	mysqli_close($link);	

	echo json_encode($answer);

?>