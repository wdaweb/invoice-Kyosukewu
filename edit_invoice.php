<?php
include_once("base.php");
$sql = "select * from invoices where id='{$_GET['id']}'";
$inv = $pdo->query($sql)->fetch();
?>
<div class="overlay">
    <div class="title bg-success">
        <p class="text-white">編輯發票</p>
        <a href="?do=invoice_list"><i class="fas fa-times"></i></a>
    </div>
    <form class="edit" action="api/update_invoice.php" method="post">
        <div class="mainedit mb-2">
            <input type="hidden" name="id" value="<?= $inv['id']; ?>">
            <div class="text col-12">
                <p class="pb-1" >發票號碼：</p>
                <p class="pb-1" >消費日期：</p>
                <p class="pb-1" >消費金額：</p>
            </div>
            <div class="work">
                <input class="i1" type="text" name="code" value="<?= $inv['code']; ?>">-<input class="i2" type="number" name="number" value="<?= $inv['number']; ?>">
                <input class="i3" type="date" name="date" value="<?= $inv['date']; ?>">
                <input class="i3" type="number" name="payment" value="<?= $inv['payment']; ?>">
            </div>
        </div>
        <div class="text-center">
            <input type="submit" value="修改">
            <input type="reset" value="重填">
            <div>
    </form>
</div>