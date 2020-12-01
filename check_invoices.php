<?php
include_once("base.php");

$year=$_GET['y'];
$period=$_GET['p'];

$nowYear=date('Y');
$nowPeriod=ceil(date("m") / 2);
$nowMonth=date('m');
$today=date('d');

$inv=$pdo->query("select * from `invoices` where date LIKE'$year%' && period='$period'")->fetchALL();

if(empty($inv)){
    if($year<$nowYear){
        header("location:index.php?do=invoice_list&y=$year&p=$period&ex=1");
    }
    if($year>$nowYear || ($year==$nowYear && $period>$nowperiod)){
        header("location:index.php?in=main&do=invoice_list&y=$year&p=$period&emp=1");
    }
}elseif(($year<$nowYear && (($period=4 && $nowPeriod==1) || ($period=5 && $nowPeriod==2) || ($period=6 && $nowPeriod==3))) || ($year==$nowYear && ($period<=$nowPeriod-4 || ($today>6 && $period==$nowPeriod-3 && ($nowMonth==11 || $nowMonth==9 || $nowMonth==7))))){
    header("location:index.php?do=invoice_list&y=$year&p=$period&ex=1");
}else{
    header("location:index.php?do=invoice_list&y=$year&p=$period");
}
?>