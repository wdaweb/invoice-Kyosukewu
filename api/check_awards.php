<?php
include_once("base.php");
$year=$_GET['y'];
$period = $_GET['p'];
$awards = $pdo->query("select * from award_numbers where year='$year' && period='$period'")->fetchALL();
if(empty($awards)){
// header("location:index.php?do=empty_awards");
}else{
header("location:index.php?do=award_numbers&y=$year&p=$period");
}
?>