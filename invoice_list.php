<?php
include_once("base.php");

$sql="select * from `invoices` order by date desc";

$rows=$pdo->query($sql)->fetchall();

// foreach($rows as $row){
//     echo $row['code']."-".$row['number']."<br>";
// }

?>

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
            <button class="btn btn-sm btn-light">編輯</button>
            <button  class="btn btn-sm btn-danger">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>