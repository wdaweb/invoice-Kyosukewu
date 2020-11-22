<?php

$dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($dsn,'root','');

date_default_timezone_set("Asia/Taipei");
session_start();

$awardStr=['頭','貳','參','肆','伍','陸',];

//欄位檢查
function accept($field,$meg='此欄位不得為空'){
    if(empty($_POST[$field])){
        $_SESSION['err'][$field]['empty']=$meg;
    }
}

function length($field,$min,$max,$meg="長度不足"){
    if(strlen($_POST[$field])>$max || strlen($_POST[$field]) < $min){
        $_SESSION['err'][$field]['len']=$meg;
    }
    
}

function email($field,$meg='email格式錯誤'){
    $email=$_POST[$field];
    echo mb_strpos($email,'@');
    if(mb_strpos($email,'@')==false){
        $_SESSION['err'][$field]['email']=$meg;
    }
}

function errFeedBack($field){
    if(!empty($_SESSION['err'][$field])){

        foreach($_SESSION['err'][$field] as $err){
            echo "<div style='font-size:12px;color:red'>";
            echo $err;
            echo "</div>";
        }
    }
}

function all($table,...$arg){
    global $pdo;
    // echo gettype($arg);
    $sql="select * from $table";
    if(isset($arg[0])){
        if(is_array($arg[0])){
        //製作會在where後的字串(陣列格式)
            if(!empty($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
                $sql=$sql." where ".implode(' && ',$tmp);
            }
        }else{
            //製作非陣列的語句接$sql後
                $sql=$sql.$arg[0];
        }
    }
    if(isset($arg[1])){
        //製作接在最後的句子字串
        $sql=$sql.$arg[1];
}
    echo $sql."<br>";
    return $pdo->query($sql)->fetchALL();
}

?>