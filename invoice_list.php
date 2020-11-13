<?php
include_once("base.php");

$sql="select * from `invoices`";

$rows=$pdo->query($sql)->fetchall();

foreach($rows as $row){
    echo $row['code']."-".$row['number']."<br>";
}

?>