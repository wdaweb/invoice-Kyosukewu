<?php
include_once("base.php");

$period_str=[
    1=>'1,2月',
    2=>'3,4月',
    3=>'5,6月',
    4=>'7,8月',
    5=>'9,10月',
    6=>'11,12月'
];

echo $_GET['year']."年";
echo $period_str[$_GET['period']]."單期發票對獎，";
//撈出該期發票
$sql="select * from `invoices` where left(date,4)='{$_GET['year']}' && period='{$_GET['period']}' Order by date";
$invoices=$pdo->query($sql)->fetchALL(PDO::FETCH_ASSOC);
echo "總共有".count($invoices)."張發票<br>";
// echo "<pre>";
// print_r($invoices);
// echo "</pre>";

//撈出該期獎號

$sql="select * from `award_numbers` where year='{$_GET['year']}' && period='{$_GET['period']}'Order by type";
$award_numbers=$pdo->query($sql)->fetchALL(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC 以欄位的方式取得資料

//PDO::FETCH_NUM 取索引

// echo "<pre>";
// print_r($award_numbers);
// echo "</pre>";

//開始對獎
$all_res=-1;
$count_res=0;
$count_award=0;
foreach($invoices as $inv){
    
    $number=$inv['number'];
    $date=$inv['date'];
    foreach($award_numbers as $award){
        switch($award['type']){
            case 1: //特別獎
                if($award['number']==$number){
                    echo "<br>發票號碼：".$number."<br>";
                    echo "<br>中了特別獎<br>";
                    $all_res=1;
                    $count_res=$count_res+1;
                    $count_award=$count_award+10000000;
                }
            break;
            case 2://特獎          
                if($award['number']==$number){
                    echo "<br>發票號碼：".$number."<br>";
                    echo "中了特獎<br>";
                    $all_res=1;
                    $count_res=$count_res+1;
                    $count_award=$count_award+2000000;
                }
            break;
            case 3://頭獎
                $res=-1;
                for($i=5;$i>=0;$i--){
                    $target=mb_substr($award['number'],$i,(8-$i),'utf8');
                    $mynumber=mb_substr($number,$i,(8-$i),'utf8');
                    if($target==$mynumber){
                        $res=$i;
                    }else{
                        break;
                        //continue
                    }
                }
                //判斷最後中的獎項
                if($res!=-1){
                    echo "<br>發票號碼：".$number."<br>";
                    echo "中了{$awardStr[$res]}獎<br>";
                    $all_res=1;
                    $count_res=$count_res+1;
                    switch($awardStr[$res]){
                        case "頭":
                            $count_award=$count_award+200000;
                        break;
                        case "貳":
                            $count_award=$count_award+40000;
                        break;
                        case "參":
                            $count_award=$count_award+10000;
                        break;
                        case "肆":
                            $count_award=$count_award+4000;
                        break;
                        case "伍":
                            $count_award=$count_award+1000;
                        break;
                        case "陸":
                            $count_award=$count_award+200;
                        break;
                    }
                }
            break;
            case 4://增開六獎
                if($award['number']==mb_substr($number,5,3,'utf8')){
                    echo "<br>發票號碼：".$number."<br>";
                    $all_res=1;
                    $count_res=$count_res+1;
                    $count_award=$count_award+200;
                    echo "中了增開六獎<br>";
                }
            break;
        }
    }
}
if($all_res==-1){
    echo "可惜不是你,再接再厲吧";
}

echo "總共中了".$count_res."張發票";
echo "共計獎金".$count_award."元";
?>
