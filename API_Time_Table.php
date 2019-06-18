<?php  

	$answer = array();
	$count_week = array('mn','ty','wd','th','fr','st');
	$teacher_ini = array('LisinaEV','BorodinaSV','KalinovskayaSA','-','-','ArefyevEA','AyzyatovaGG','GolenduhinaTR','SandakovaDN','CheymetovaTV','VohmencevaTN','LagohinAP','BekshenevaGH','RusakovMYU','UrusovAA','NugmanovVN','-','FisenkoEM','NorinaNN','KaluginaSV','RomanenkoSV','AphadzeNA','GulyaevIP','MiheevaLV','KlimovichNP','VtorushinaYUA','KuroedovaTA','MosolCV','SizovaKN','-','PosohovaMA','ShestopalovaEA','ProsverennikovaSA','GorshunovaSV','ShipunovaOV','UzhanovaTL','TimofeevPN','PermyakovaLP','RagozinaTM','MuhamedzhanovaZB','TulinaNB','VergunovaTZ','PavlovaNG','SushkovaAA','LitvinovaAV','PolishyukAA','LitusAA','-','ShvetsovEV','IgnatovaSM','AlerskayaNV','ZvonarevaIM','RashevskayaSF','PopovAN','GurulyovIA','AymetdinovBI','-','PetrovAM','PodkovirkinaVL','-','-','-','-','-','-','-','-','-','-','-','-','-','-');
	$student_ini = array('AT1609','AT1709','AT1711','AT1811','ATPiP1509','ATPiP1609','ATPiP1611','DO15091','DO15092','DO1611','DO17111','DO17112','DO18111','DO18112','KP16111','KP16112','KP1709','KP17111','KP17112','KP17113','KP18111','KP18112','KS1611','OSATPiP1711','OSATPiP18111','OSATPiP18112','OSATPiP18112','PDOTT1509','PDOTT1609','PDOTT1709','PDOTT18111','PDOTT18112','SSA1711','SSA18111','SSA18112','SHO15091','SHO15092');
	$answer = array(
		"mn"=>array(
			"mn1"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn2"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn3"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn4"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn5"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn6"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn7"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn8"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn9"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn10"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn11"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"mn12"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""))
		),
		"ty"=>array(
			"ty1"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty2"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty3"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty4"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty5"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty6"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty7"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty8"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty9"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty10"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty11"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"ty12"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""))
		),
		"wd"=>array(
			"wd1"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd2"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd3"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd4"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd5"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd6"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd7"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd8"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd9"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd10"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd11"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"wd12"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""))
		),
		"th"=>array(
			"th1"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th2"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th3"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th4"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th5"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th6"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th7"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th8"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th9"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th10"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th11"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"th12"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""))
		),
		"fr"=>array(
			"fr1"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr2"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr3"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr4"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr5"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr6"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr7"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr8"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr9"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr10"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr11"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"fr12"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""))
		),
		"st"=>array(
			"st1"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st2"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st3"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st4"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st5"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st6"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st7"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st8"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st9"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st10"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st11"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>"")),
			"st12"=>array("1"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""),"2"=>array("Name_Lessons"=>"","Who_Is_Who"=>"","Room"=>"","Sungroup"=>""))
		)
	);
	///row0 -> день недели
	///row2 -> пара
	function Count_Para ($row0,$row2){
		$count_week = array('mn','ty','wd','th','fr','st');
		$answe = $count_week[(int)$row0-1].$row2;  
		return $answe;
	}
	$dbHost = 'localhost'; 
	$dbUser = 'root'; 
	$dbPass = ''; 
	$dbName = 'timetable'; 

	$link = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName) or die ("ошибка".mysqli_connect_error($link));

	if($check_stat == 0){
		$timetable_q = "SELECT timetable.day, timetable.number,timetable.subgroup,lessons.name ,timetable.teacher ,rooms.name FROM timetable INNER JOIN lessons ON timetable.lesson = lessons.id INNER JOIN rooms ON timetable.room = rooms.id WHERE (timetable.groupname = '34' ) ORDER BY lessons.name, timetable.subgroup DESC";
	}else{
		$timetable_q = "SELECT timetable.day, timetable.number,timetable.subgroup,lessons.name ,timetable.teacher ,rooms.name FROM timetable INNER JOIN lessons ON timetable.lesson = lessons.id INNER JOIN rooms ON timetable.room = rooms.id WHERE (timetable.groupname = '34' ) ORDER BY lessons.name, timetable.subgroup DESC";
	}


	

	$timetable = mysqli_query($link, $timetable_q) or die ("ошибка2 ".mysqli_connect_error($link));
	$rows = mysqli_num_rows($timetable);///кол-во строк в полученой таблице
	$arg = ""; ///вспомогательная строка для отлова повторения предмета
	$tru = false; ///Доступ к генерации двух подгрупп, если есть номер подгруппы "2" в БД у этого предмета 

	for ($i=0; $i < $rows; $i++) { 
		$row = mysqli_fetch_row($timetable); ///обращение к строке
		if ($arg != $row[3]){ ///row[3] -> название предмета
			$arg = $row[3];
			$tru = false;
		}
		if($row[2]=="2"){$tru = true;} ///row[2] -> подгруппа 1 или 2
		
		///Генерация
		if($tru){
			$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])][$row[2]]["Name_Lessons"] = $row[3];
			if($check_stat == 1){
				$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])][$row[2]]["Who_Is_Who"] = $teacher_ini[(int)$row[4]-1];
			}else if($check_stat == 0){
				$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])][$row[2]]["Who_Is_Who"] = $student_ini[(int)$row[4]-1];
			}
			$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])][$row[2]]["Room"] = $row[5];
			$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])][$row[2]]["Sungroup"] = $row[2];
		}else{
			$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])]["1"]["Name_Lessons"] = $row[3];
			if($check_stat == 1){
				$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])]["1"]["Who_Is_Who"] = $teacher_ini[(int)$row[4]-1];
			}else if($check_stat == 0){
				$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])]["1"]["Who_Is_Who"] = $student_ini[(int)$row[4]-1];
			}
			$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])]["1"]["Room"] = $row[5];
			$answer[$count_week[(int)$row[0]-1]][Count_Para($row[0],$row[1])]["1"]["Sungroup"] = "0";
		}
		///Генерация
	}

	mysqli_close($link);

///======================================================================================
///
///  Отправка массива
///  
///======================================================================================
	echo json_encode($answer);

 ?>