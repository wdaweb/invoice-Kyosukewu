<?php
include_once("base.php");
$sql = "select * from invoices where id='{$_GET['id']}'";
$inv = $pdo->query($sql)->fetch();
?>
<form action="api/update_invoice.php" method="post">
    <input type="hidden" name="id" value="<?= $inv['id']; ?>">
    <div>發票號碼：<input style="width: 50px;" type="text" name="code" value="<?= $inv['code']; ?>">-<input type="number" name="number" value="<?= $inv['number']; ?>"></div>
    <div>消費日期：<input type="date" name="date" value="<?= $inv['date']; ?>"></div>
    <div>消費金額：<input type="number" name="payment" value="<?= $inv['payment']; ?>"></div>
    <div class="text-center my-3">
        <input type="submit" value="修改">
        <input type="reset" value="重填">
        <div>
</form>