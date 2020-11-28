<?php
include_once("base.php");
$year=explode("-", $_GET['pd'])[0];
$period = explode("-", $_GET['pd'])[1];
$awards = $pdo->query("select * from award_numbers where year='$year' && period='$period'")->fetchALL();
if(empty($awards)){
header("location:index.php?do=empty_awards");
}else{
header("location:index.php?do=award_numbers&pd=$year-$period");
}
?>