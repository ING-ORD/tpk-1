<?php 
$dbHost = 'localhost'; 
$dbUser = 'root'; 
$dbPass = ''; 
$dbName = 'timetable'; 

$link = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName) or die ("ошибка".mysqli_connect_error($link));

$status = $_POST["status"];
$group = $_POST["group"];
$week = $_POST["week"];

$answer = array("teacher" => "Да", "group" => "Нет", "week" => "Возможно");
//echo json_encode($answer);
echo json_encode($answer);
?>