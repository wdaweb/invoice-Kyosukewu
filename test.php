<?php

include_once("base.php");

find('invoices',"id='9'");

function find($table,$id){
    global $pdo;
    if(is_numeric($id)){
        $sql="select * from $table where id='$id'";
    }else{
        $sql="select * from $table where $id";
    }

    $row=$pdo->query($sql)->fetch();
    return $row;
}
$row=find('invoices',11);


echo $row['code'];
echo $row['number'];

?>