<?php
$inv=$pdo->query("select * from invoices where id='{$_GET['id']}'")->fetch();
?>
<div class="mes w-100 h-100 d-flex justify-content-center align-items-center">
<div class="col-md-6 text-center border p-4">
    <div class="text-center">確認要刪除以下發票資料嗎?</div>
    <ul class="list-group">
        <li class="list-group-item"><?=$inv['code'].$inv['number'];?></li>
        <li class="list-group-item"><?=$inv['date'];?></li>
        <li class="list-group-item"><?=$inv['payment'];?></li>
    </ul>
    <div class="text-center mt-4">
        <a href="?do=del_invoice_check&del=1&id=<?=$_GET['id'];?>">
        <!-- do=del用來區分是要帶值來刪除頁or刪除資料 -->
        <button class="btn-danger">確認</button>
        </a>
        <a href="?do=invoice_list">
        <button class="btn-warning">取消</button>
        </a>
    </div>
</div>
</div>