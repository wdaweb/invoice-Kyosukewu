<?php

$dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($dsn,'root','');

date_default_timezone_set("Asia/Taipei");
session_start();

$awardStr=['頭','貳','參','肆','伍','陸',];

$_SESSION['err']=[];//因SESSION會暫存資料 故須先清空

accept('acc','帳號欄位不得為空');
// if(empty($acc)){
//     $_SESSION['err']['acc']['empty']=true;
// }
length('acc',4,10,'帳號須為4~10個字元');
// if(strlen($acc)>=10 || strlen($acc)<=4){
//     $_SESSION['err']['acc']['len']=true;
// }
accept('pw','密碼欄位不得為空');
// if(empty($pw)){
//     $_SESSION['err']['pw']['empty']=true;
// }
length('pw',8,16,'密碼須為8~16個字元');
// if(strlen($pw)>=16 || strlen($pw)<=8){
//     $_SESSION['err']['pw']['len']=true;
// }
accept('name','姓名欄位不得為空');
length('name',1,8,'姓名須為1~8個字元');
$birthday=$_POST['birthday'];
$addr=$_POST['addr'];
$tel=$_POST['tel'];
accept('email','Email欄位不得為空');
email('email');

//欄位檢查完畢
if(empty($_SESSION['err'])){
    $sql="inset";
    // $pdo->exec($sql);
}

header("location:index.php");




function accept($field,$meg='此欄位不得為空'){
    if(empty($_POST[$field])){
        $_SESSION['err'][$field]['empty']=$meg;
    }
}

function length($field,$min,$max,$meg='長度不足'){
    if(strlen($_POST[$field])>=$max || strlen($_POST[$field])<=$min){
        $_SESSION['err']['acc']['len']=$meg;
    }
}
function email($field,$meg='Email格式錯誤'){
    $email=$_POST['email'];
    if(mb_strpos($email,'@')==false){
        $_SESSION['err'][$field]['email']=$meg;
}
}
?>