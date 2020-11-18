<?php
include_once("base.php");

$codebase=["AB","CD","GR","HR","MB","PB"];
echo "資料產生中......";
echo date("Y-m-d H:i:s");
for($i=0;$i<200;$i++){
    $code=$codebase[rand(0,5)];//2位元大寫字母
    $number=sprintf("%08d",rand(0,99999999));
    //$number=str_pad(rand(0,99999999),8,'0',STR_PAD_LEFT);//8碼字串 左側補零
    $payment=rand(1,3000);//正整數
    $start=strtotime("2020-01-01");
    $end=strtotime("2020-12-31");
    $date=date("Y-m-d",rand($start,$end));
    $period=ceil(explode("-",$date)[1]/2);
    $fake=[
    'code'=>$code,
    'number'=>$number,
    'payment'=>$payment,
    'date'=>$date,
    'period'=>$period
];
    $sql="insert into invoices (`".implode("`,`",array_keys($fake))."`) values('".implode("','",$fake)."')";
    $pdo->exec($sql);
}

echo "<br>";
echo "資料新增完成......";
echo date("Y-m-d H:i:s");
?>