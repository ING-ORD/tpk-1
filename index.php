<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Расписание</title>
	<script src="jquery-3.3.1.min.js"></script>
</head>
<body>
	<?php 
		include_once "timetable.php";
	 ?>
	 <script type="text/javascript" charset="utf-8">
	 	$(document).ready(function(){
	 		$("h1").bind("click",function(){
	 			$("h1").text(<?php echo "'".json_decode($_POST['teacher'])."'"; ?>);
	 		});
	 	});
	 </script>
		
</body>
</html>