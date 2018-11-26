<?php 
$status = $_POST["status"]."\n";
$group = $_POST["group"]."\n";
$week = $_POST["week"]."\n";

//$answer = array("teacher" => "Да", "group" => "Нет", "week" => "Возможно");
//echo json_encode($answer);
echo json_encode($_POST);
?>