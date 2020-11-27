<?php include_once("base.php") ?>
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
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <title>統一發票紀錄及對獎系統</title>
</head>
<style>
  body {
    width: 100vw;
    height: 100vh;
    background: url(https://i.postimg.cc/v87d6mGg/bg1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    position: relative;
    overflow: hidden;
    font-family: "Noto Sans TC", sans-serif;
  }

  .path1 a,
  .path2 a {
    padding: 10px;
    color: #fff;
    text-decoration: none;
  }

  .bg1,
  .bg2,
  .bg3,
  .bg4 {
    position: absolute;
  }

  .path1,
  .path2 {
    display: flex;
    position: absolute;
  }

  .path1 {
    bottom: -5%;
    right: 2%;
  }

  .path2 {
    top: -5%;
    left: 2%;
  }

  .p0,
  .p0-2,
  .p1,
  .p2,
  .p3,
  .p4,
  .p5 {
    display: flex;
    justify-content: center;
    height: 40px;
    box-shadow: 5px 5px 10px #333;
    transition: transform 0.5s 0s ease;
  }

  .p0,
  .p1,
  .p2,
  .p3 {
    align-items: flex-start;
  }
  .p0,
  .p1,
  .p2,
  .p3 {
    align-items: flex-start;
    border-radius: 0 0 5px 5px;
  }
  
  .p0-2,
  .p4,
  .p5 {
    align-items: flex-end;
    border-radius: 5px 5px 0 0;
  }

  .p4:hover,
  .p5:hover {
    transform: scaleY(1.3) perspective(1em) rotateX(-3deg);
  }

  .p1:hover,
  .p2:hover,
  .p3:hover {
    transform: scaleY(1.3) perspective(1em) rotateX(3deg);
  }

  .bg1,
  .bg2,
  .bg3,
  .bg4 {
    z-index: -2;
    display: none;
  }

  .container {
    display: flex;
    align-items: center;
    height: 100vh;
  }

  .book {
    width: 100%;
    height: 90%;
    background: url(https://i.postimg.cc/7h6c8r7w/bgbook1.png) no-repeat center center;
    background-size: 100% 100%;
    background-position: 50% 50%;
    position: relative;
    border-radius: 20px;
  }

  .book::before {
    content: "";
    position: absolute;
    top: -1%;
    bottom: -1%;
    right: -1%;
    left: -1%;
    background: #000;
    box-shadow: 2px 2px 10px 0px #333;
    border-radius: 20px;
    z-index: -1;
  }

  .content {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    height: 97%;
    margin: 2% 0;
  }

  .content-l {
    background: url(https://i.postimg.cc/WpWCmtL3/left-bg1.jpg);
    background-size: cover;
    position: relative;
    border-radius: 15px 15px 0 0;
  }

  .content-r {
    background: url(https://i.postimg.cc/zvcQq2SW/right-bg1.jpg);
    background-size: cover;
    position: relative;
    border-radius: 0 0 15px 15px;
  }

  .ll {
    width: 35%;
    text-align-last: justify;
  }

  .inv {
    height: 85%;
    overflow: auto;
  }

  .t1,
  .t2 {
    width: 40%;
  }

  .t3 {
    width: 20%;
  }

  .path,
  .page {
    height: 10%;
  }
  .aw{
    height: 5%;
  }

  .tit {
    height: 1.5rem;
  }

  .path a {
    text-decoration: none;
  }

  .tip {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background: #000;
  }

  .table {
    display: flex;
    flex-direction: column;
    height: 100%;
    margin: 0;
  }
  .table-container{
    width: 100%;
    height: 60%;
  }

  .table tbody {
    overflow-y: scroll;
  }
  thead td{
      padding-bottom: 5px;
  }

  @media screen and (min-width: 375px) {
    .table-container{
    height: 70%;
  }
    thead td{
      padding-bottom: 16px;
    }
    .path1 {
      bottom: -3%;
    }
    .path2 {
      top: -3.5%;
    }
  }

  @media screen and (min-width: 576px) {
    .table-container{
    height: 80%;
  }
    .bg1,
    .bg2,
    .bg3,
    .bg4 {
      display: block;
    }

    .bg1 {
      height: 100vh;
      top: -50%;
      left: -10%;
    }

    .bg2 {
      top: -30%;
      right: -5%;
      height: 40vh;
    }

    .bg3 {
      right: -20%;
      bottom: -15%;
      height: 24vh;
    }

    .bg4 {
      bottom: -5%;
      height: 17vh;
      right: 80%;
    }

    .content-l {
      background: url(https://i.postimg.cc/52mpz3rC/left-bg.jpg);
      background-size: cover;
    }

    .content-r {
      background: url(https://i.postimg.cc/8CP4mv8n/right-bg.jpg);
      background-size: cover;
    }
  }

  @media screen and (min-width: 768px) {
    .ll {
      width: 25%;
    }

    .path1,
    .path2 {
      top: -2.5%;
    }

    .t1 {
      width: 25%;
    }

    .t2,
    .t4 {
      width: 30%;
    }

    .t3 {
      width: 15%;
    }

    .bg4 {
      bottom: 0;
    }
  }

  @media screen and (min-width: 992px) {
    .path1 {
      display: block;
      top: 5%;
      right: -7%;
    }

    .path2 {
      display: block;
      top: 5%;
      left: -6%;
    }
    .p0,.p1,.p2,.p3,.p4,.p5{
      width: 100px;
      transform: matrix(1, 0, 0, 1, 0, 0);
      transition: transform 0.5s 0s ease;
    }
    .p0,
    .p1,
    .p2,
    .p3 {
      justify-content: flex-end;
      border-radius: 0 5px 5px 0;
    }

    .p1:hover,
    .p2:hover,
    .p3:hover {
      transform: matrix(0.8, -0.25, 0, 1, 0, -10);
    }
    .p4,
    .p5 {
      justify-content: flex-start;
      border-radius: 5px 0 0 5px;
    }

    .p4:hover,
    .p5:hover {
      transform: matrix(0.8, 0.25, 0, 1, 0, -10);
    }
    .bg1 {
      top: -40%;
    }

    .bg2 {
      top: -20%;
    }

    .bg3 {
      right: -3%;
      bottom: -10%;
    }

    .bg4 {
      right: 70%;
    }

    .book {
      width: 100%;
      height: 73%;
      background: url(https://i.postimg.cc/D0VLb3fc/bgbook.png) no-repeat center center;
      background-size: 100% 100%;
    }

    .content {
      width: 96%;
      height: 99%;
      margin: 0.5% 2.5%;
    }

    .content-l {
      background: url(https://i.postimg.cc/52mpz3rC/left-bg.jpg);
      background-size: 100% 100%;
      border-radius: 15px 0 0 15px;
    }

    .content-r {
      background: url(https://i.postimg.cc/8CP4mv8n/right-bg.jpg);
      background-size: 100% 100%;
      border-radius: 0 15px 15px 0;
    }
  }

  @media screen and (min-width: 1200px) {
    .path1 {
      right: -6%;
    }
    .path2 {
      left: -5%;
    }

    .p0,.p1,.p2,.p3,.p4,.p5{
      width: 100px;
      transform: matrix(1, 0, 0, 1, 0, 0);
      transition: transform 0.5s 0s ease;
    }
    .p0,
    .p1,
    .p2,
    .p3 {
      justify-content: flex-end;
      border-radius: 0 5px 5px 0;
    }

    .p1:hover,
    .p2:hover,
    .p3:hover {
      transform: matrix(0.8, -0.25, 0, 1, 0, -10);
    }
    .p4,
    .p5 {
      justify-content: flex-start;
      border-radius: 5px 0 0 5px;
    }

    .p4:hover,
    .p5:hover {
      transform: matrix(0.8, 0.25, 0, 1, 0, -10);
    }

    .book {
      height: 73%;
      background: url(https://i.postimg.cc/D0VLb3fc/bgbook.png) no-repeat center center;
      background-size: 100% 100%;
    }
  }

  @media screen and (min-width: 1400px) {
    .path1 {
      right: -5%;
    }

    .path2 {
      left: -4%;
    }

    .bg1,
    .bg2,
    .bg3,
    .bg4 {
      display: block;
    }

    .bg1 {
      height: 100vh;
      left: 0;
    }

    .bg2 {
      top: -20%;
      right: 0%;
    }


    .bg4 {
      bottom: -5%;
    }

    .book {
      height: 75%;
    }
  }
</style>

<body>
  <div class="bg">
    <img class="bg1" src="https://i.postimg.cc/WbXLXfFs/bg1.png" alt="">
    <img class="bg2" src="https://i.postimg.cc/9MNNw1DB/bg3.png" alt="">
    <img class="bg3" src="https://i.postimg.cc/hvkypjbz/bg4.png" alt="">
    <img class="bg4" src="https://i.postimg.cc/x8JpvHHV/bg5.png" alt="">
  </div>
  <div class="container">
    <div class="book">
      <?php
      $month = [
        1 => "1-2月",
        2 => "3-4月",
        3 => "5-6月",
        4 => "7-8月",
        5 => "9-10月",
        6 => "11-12月",
      ];
      // $m = ceil(date("m") / 2);
      if (empty($_GET['p'])) {
        $period = ceil(date("m") / 2);
      } else {
        $period = $_GET['p'];
      }

      $leftPage = "main";
      $rightPage = "invoice_list";

      ?>
      <div class="path1">
        <div class="p0 text-light bg-info d-none d-md-flex"><a href="#"><?= $month[$period]; ?></a></div>
        <div class="p1 bg-success mb-1"><a href="?in=<?= $leftPage ?>&do=invoice_list">當期發票</a></div>
        <div class="p2 bg-danger mb-1"><a href="?in=add_awards&do=award_numbers">全期對獎</a></div>
        <div class="p3 bg-dark mb-1"><a href="index.php">闔上</a></div>
      </div>
      <div class="path2">
        <div class="p0-2 text-light bg-info d-flex d-md-none"><a href="#"><?= $month[$period]; ?></a></div>
        <div class="p4 bg-primary mb-1"><a href="?in=main&do=<?= $rightPage ?>">輸入發票</a></div>
        <div class="p5 bg-warning mb-1"><a href="?in=add_awards&do=award_numbers">輸入獎號</a></div>
      </div>
      <div class="content">
        <div class="content-l col-12 col-lg-6">
          <div class="card-img-overlay">
            <?php
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
</script>