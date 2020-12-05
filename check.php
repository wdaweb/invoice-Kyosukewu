<?php
/******登入檢查******/

include_once "base.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];
$_SESSION['login']=$acc;

$sql="select * from `login` where `acc`='$acc' && `pw`='$pw'";

$check=$pdo->query($sql)->fetch();

if(!empty($check)){
    echo "登入成功";
    $member_sql="select * from member where login_id='{$check['id']}'";
    $member=$pdo->query($member_sql)->fetch();
    $role=$member['role'];

    setcookie("login",$acc,time()+3600);//120 單位:秒
    header('location:logindex.php');
}else{
    header("location:index.php?meg=帳號或密碼不正確，請重新輸入或註冊新帳號");
}

?>