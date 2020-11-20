<?php

include_once("base.php");

// Find('invoices',"id='9'");

function Finddata($table,$id){
    global $pdo;

    if(is_numeric($id)){
        $sql="select * from $table where id='$id'";
    }else{
        $sql="select * from $table where $id";
    }

    $row=$pdo->query($sql)->fetch();
    return $row;
}
// $row=Find('invoices',11);


// echo $row['code'];
// echo $row['number'];

// echo implode(" && ",['欄位1'=>'值1','欄位2'=>'值2','欄位3'=>'值3']);
// echo "<br>";
// echo "`欄位1`='值1',`欄位2`='值2',`欄位3`='值3'";
// echo "<br>";


//利用一個暫時的陣列存放語句片段
$array=['欄位1'=>'值1','欄位2'=>'值2','欄位3'=>'值3'];

foreach($array as $key => $value){
    $tmp[]="`".$key."`='".$value."'";}
    //函式方法 $tmp[]=sprintf("`%s`='%s'",%key,$value);
//用implode把暫時的片段串成sql語句
// echo implode(" && ",$tmp);
?>
<?php
// 取得單一資料的自訂函式
    function Finddata2($table,$id){
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

// echo "<hr>";
// all('invoices');
// echo "<hr>";
// all('invoices',['code'=>"HR",'period'=>6]);
// echo "<hr>";
// all('invoices',['code'=>'AB','period'=>1],' Order by date desc');
// echo "<hr>";
// all('invoices'," limit 5");
// echo "<hr>";


function del($table,$id){
    global $pdo;
    $sql="delete * from $table where ";
    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        $sql=$sql.implode(' && ',$tmp);
    }else{
        $sql=$sql. " id='$id' ";
    }

    $row=$pdo->exec($sql);
    return $row;
}

echo "<hr>";
$def=['code'=>'HR'];
echo del('invoices',$def);
echo "<hr>";
?>

