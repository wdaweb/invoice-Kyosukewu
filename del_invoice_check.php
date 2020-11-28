<?php
include_once("base.php");
if(isset($_GET['del'])){
del('invoices',$_GET['id']);
header("location:index.php?do=invoice_list");
}
?>
