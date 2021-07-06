<?php
include_once("base.php");

?>

<div class="overlay">
    <div class="title bg-dark">
        <p class="text-white">系統登出</p>
        <a href="?do=invoice_list"><i class="fas fa-times"></i></a>
    </div>
    <div class="edit text-center">
        <p>確定要登出系統？</p>
        <div class="mainedit mb-2">
            <div class="w-100">
            </div>
        </div>
        <div class="text-center">
            <a href="logoutCheck.php">
                <button class="btn-danger">確認</button>
            </a>
            <a href="?do=invoice_list">
                <button class="btn-dark">取消</button>
            </a>
        </div>
    </div>