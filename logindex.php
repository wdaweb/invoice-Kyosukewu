<?php
include_once("base.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a1381bb91e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>統一發票紀錄及對獎系統</title>
</head>
<body>
  <div class="bg">
    <img class="bg1" src="https://i.postimg.cc/WbXLXfFs/bg1.png" alt="">
    <img class="bg2" src="https://i.postimg.cc/9MNNw1DB/bg3.png" alt="">
    <img class="bg3" src="https://i.postimg.cc/hvkypjbz/bg4.png" alt="">
    <img class="bg4" src="https://i.postimg.cc/x8JpvHHV/bg5.png" alt="">
  </div>
  <?php
    if(isset($_SESSION['login'])){
      echo "<span class='ml-3 text-danger'>歡迎！".$_SESSION['login']." 大大</span>";
    }
    ?>
  <div class="container">
    <div class="book">
      <?php
      // $m = ceil(date("m") / 2);
      if (empty($_GET['p'])) {
        $period = ceil(date("m") / 2);
      } else {
        $period = $_GET['p'];
      }

      $leftPage = "main";
      $rightPage = "invoice_list";

      if (empty($_GET['in'])) {
        $leftPage = "main";
      } else {
        $leftPage = $_GET['in'];
      }
      if (empty($_GET['do'])) {
        $rightPage = "invoice_list";
      } else {
        $rightPage = $_GET['do'];
      }
      ?>
      <div class="path1">
        <div class="p1 bg-success mb-1"><a href="?in=<?= $leftPage ?>&do=invoice_list">當期發票</a></div>
        <div class="p2 bg-danger mb-1"><a href="?in=<?= $leftPage ?>&do=award_numbers">全期對獎</a></div>
        <div class="p0 bg-info d-none d-md-flex mb-1"><a href="?in=<?= $leftPage ?>&do=reward_record">中獎紀錄</a></div>
        <div class="p3 bg-dark mb-1"><a href="?do=logout">登出</a></div>
      </div>
      <div class="path2">
        <div class="p4 bg-primary mb-1"><a href="?in=main&do=<?= $rightPage ?>">輸入發票</a></div>
        <?php
        if($_SESSION['login'] == "admin"){
          echo "<div class='p5 bg-warning mb-1'><a href='?in=management&do=".$rightPage."'>管理</a></div>";
        }
        ?>
        <div class="p0-2 bg-info d-flex d-md-none"><a href="?in=<?= $leftPage ?>&do=reward_record">中獎紀錄</a></div>
        </div>
      <div class="content">
        <div class="content-l col-12 col-lg-6">
          <div class="card-img-overlay h-100">
            <?php
            ob_start();
            if (isset($_GET['in'])) {
              $file = $_GET['in'] . ".php";
              include $file;
            } else {
              include "main.php";
            }
            ?>
          </div>
        </div>
        <div class="content-r col-12 col-lg-6">
          <div class="card-img-overlay">
            <?php
            ob_start();
            if (isset($_GET['do'])) {
              $file = $_GET['do'] . ".php";
              include $file;
            } else {
              include "invoice_list.php";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php $_SESSION['err'] = []; ?>
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
  var toastElList = [].slice.call(document.querySelectorAll('.toast'))
  var toastList = toastElList.map(function(toastEl) {
    return new bootstrap.Toast(toastEl, option)
  })
  var alertList = document.querySelectorAll('.alert')
  alertList.forEach(function(alert) {
    new bootstrap.Alert(alert)
  })
</script>