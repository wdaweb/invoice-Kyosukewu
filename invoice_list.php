<?php
include_once("base.php");

$period=ceil(date('m')/2);
$sql="select * from `invoices` where period='$period'  order by date desc";
// $sql="select * from `invoices` order by date desc";

$rows=$pdo->query($sql)->fetchall();

// foreach($rows as $row){
//     echo $row['code']."-".$row['number']."<br>";
// }

?>
<div class="row">
    <div class="d-flex justify-content-around mb-3">
        <a href="">1,2月</a>
        <a href="">3,4月</a>
        <a href="">5,6月</a>
        <a href="">7,8月</a>
        <a href="">9,10月</a>
        <a href="">11,12月</a>
    </div>
<table class="table text-center">
    <tr class="text-center">
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>消費金額</td>
        <td>操作</td>
    </tr>
    <?php
    foreach($rows as $row){
    ?>
    <tr>
        <td><?=$row['code']."-".$row['number']?></td>
        <td><?=$row['date']?></td>
        <td class="text-center"><?=$row['payment']?></td>
        <td>
            <a href="?do=edit_invoice&id=<?=$row['id'];?>">
            <button class="btn btn-sm btn-light">編輯</button></a>
            <a href="?do=del_invoice&id=<?=$row['id'];?>">
            <button  class="btn btn-sm btn-danger">刪除</button></a>
            <a href="?do=award&id=<?=$row['id'];?>">
            <button  class="btn btn-sm btn-success">對獎</button></a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
</div>