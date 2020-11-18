<?php
include_once ("base.php");

$inv_id=$_GET['id'];
$invoice=$pdo->query("select * from invoices where id='$inv_id'")->fetch();

// echo "<pre>";
// print_r($invoice);
// echo "</pre>";
$number=$invoice['number'];
//找出獎號
//**
//確認期數->依照目前的發票日期做分析
//得到期數資料後->撈出該期的開獎獎號


$date=$invoice['date'];
//explode('-',$date)取日期資料的陣列,陣列的第二個元素即月
//月份期可推算期數，有期數及年份即可找到開獎號碼
$year=explode('-',$date)[0];
$period=ceil(explode('-',$date)[1]/2);

$awards=$pdo->query("select * from award_numbers where year='$year' && period='$period'")->fetchALL();

// echo "<pre>";
// print_r($awards);
// echo "</pre>";

foreach($awards as $award){
    switch($award['type']){
        case 1://特別號
            if($award['number']==$number){
                echo "號碼：".$number."<br>中大獎啦！中了特別獎啦~";
            }
        break;
        case 2://特獎
            if($award['number']==$number){
                echo "號碼：".$number."<br>中大獎啦！中了特獎啦~";
            }
        break;
        case 3://頭獎
            for($i=5;$i>=0;$i--){//從尾數開始對
                $target=mb_substr($award['number'],$i,(8-$i),'utf8');
                $mynumber=mb_substr($number,$i,(8-$i),'utf8');

            if($target==$mynumber){
                echo "號碼：".$number."<br>中獎啦！中了{$awardStr[$i]}獎啦~<br>";
            }else{
                break;//continue;
            }
        }
        break;
        case 4://增開六獎
            if($award['number']==mb_substr($number,5,3,'utf8')){
                echo "號碼：".$number."<br>中獎啦！中了增開陸獎啦~<br>";
            }
        break;
    }
}

?>