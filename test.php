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

echo implode(" && ",['欄位1'=>'值1','欄位2'=>'值2','欄位3'=>'值3']);
echo "<br>";
echo "`欄位1`='值1',`欄位2`='值2',`欄位3`='值3'";
echo "<br>";


//利用一個暫時的陣列存放語句片段
$array=['欄位1'=>'值1','欄位2'=>'值2','欄位3'=>'值3'];

foreach($array as $key => $value){
    $tmp[]="`".$key."`='".$value."'";}
    //函式方法 $tmp[]=sprintf("`%s`='%s'",%key,$value);
//用implode把暫時的片段串成sql語句
echo implode(" && ",$tmp);

    function find2($table,$id){
        global $pdo;
        $sql="select * from $table where ";
        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql.implode(' && ',$tmp);
        }else{
            $sql=$sql . " id='$id' ";
        }
        $row=$pdo->query($sql)->fetch();
    
        return $row;
    }

?>