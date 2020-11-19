<?php
include_once("base.php");

$period_str=[
    1=>'1,2月',
    2=>'3,4月',
    3=>'5,6月',
    4=>'7,8月',
    5=>'9,10月',
    6=>'11,12月',
];



echo $_GET['year']."年";
echo $period_str[$_GET['period']]."單期發票對獎，";
//撈出該期發票
$sql="select * from `invoices` where left(date,4)='{$_GET['year']}' && period='{$_GET['period']}' Order by date";
$invoices=$pdo->query($sql)->fetchall(PDO::FETCH_ASSOC);
echo "總共有".count($invoices)."筆資料<br>";
// echo "<pre>";
// print_r($invoices);
// echo "</pre>";

//撈出該期獎號

$sql="select * from `award_numbers` where year='{$_GET['year']}' && period='{$_GET['period']}'Order by type";
$award_numbers=$pdo->query($sql)->fetchall(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC 以欄位的方式取得資料

//PDO::FETCH_NUM 取索引

// echo "<pre>";
// print_r($award_numbers);
// echo "</pre>";

//開始對獎
$all_res=-1;
foreach($invoices as $inv){
    $number=$inv['number'];
    $date=$inv['date'];
    $year=explode('-',$date)[0];
    $period=ceil(explode('-',$date)[1]/2);
    foreach($award_numbers as $award){
    switch($award['type']){
        case 1://特別號
            if($award['number']==$number){
                echo "號碼：".$number."<br>中大獎啦！中了特別獎啦~";
                $all_res=1;
            }
        break;
        case 2://特獎
            if($award['number']==$number){
                echo "號碼：".$number."<br>中大獎啦！中了特獎啦~";
                $all_res=1;
            }
        break;
        case 3://頭獎
            $res=-1;
            for($i=5;$i>=0;$i--){//從尾數開始對
                $target=mb_substr($award['number'],$i,(8-$i),'utf8');
                $mynumber=mb_substr($number,$i,(8-$i),'utf8');

            if($target==$mynumber){
                // echo "號碼：".$number."<br>中獎啦！中了{$awardStr[$i]}獎啦~<br>";
                $res=$i;
            }else{
                break;//continue;
            }
        }
        if($res!=-1){//判斷最終的獎項
        echo "號碼：".$number."<br>中獎啦！中了{$awardStr[$res]}獎啦~<br>";
        $all_res=1;
        }
        break;
        case 4://增開六獎
            if($award['number']==mb_substr($number,5,3,'utf8')){
                echo "號碼：".$number."<br>中獎啦！中了增開陸獎啦~<br>";
            }
            $all_res=1;
        break;
        }
    }
}
if($all_res==-1){
    echo "可惜不是你,再接再厲吧";
}

?>
