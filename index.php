<?php include_once("base.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a1381bb91e.js" crossorigin="anonymous"></script>
  <title>統一發票紀錄及對獎系統</title>
  <style type="text/css">
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
      font-family: 'Noto Sans TC', sans-serif;
    }

    .path1 a,
    .p0 {
      padding: 10px;
      color: #FFF;
      text-decoration: none;
    }

    .bg1,
    .bg2,
    .bg3,
    .bg4 {
      position: absolute;
    }

    .path1 {
      display: flex;
      position: absolute;
      top: -3%;
      right: 2%;
    }

    .p0,
    .p1,
    .p2,
    .p3,
    .p4 {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 40px;
      border-radius: 5px 5px 0 0;
      box-shadow: 5px 5px 10px #333;
      transition: transform .5s 0s ease;
    }

    .p1:hover,
    .p2:hover,
    .p3:hover,
    .p4:hover {
      transform: scaleY(1.3) perspective(1em) rotateX(-3deg);
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
      height: 96.5%;
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
    .ll{
      text-align-last: justify;
    }

    @media screen and (min-width: 576px) {

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
        position: relative;
        border-radius: 15px 15px 0 0;
      }

      .content-r {
        background: url(https://i.postimg.cc/8CP4mv8n/right-bg.jpg);
        background-size: cover;
        position: relative;
        border-radius: 0 0 15px 15px;
      }
    }

    @media screen and (min-width: 768px) {

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
        bottom: 0%;
        height: 24vh;
      }

      .bg4 {
        bottom: 0;
        height: 17vh;
        right: 80%;
      }
      .content-l {
        background: url(https://i.postimg.cc/52mpz3rC/left-bg.jpg);
        background-size: cover;
        position: relative;
        border-radius: 15px 15px 0 0;
      }

      .content-r {
        background: url(https://i.postimg.cc/8CP4mv8n/right-bg.jpg);
        background-size: cover;
        position: relative;
        border-radius: 0 0 15px 15px;
      }
    }

    @media screen and (min-width: 992px) {
      .path1 {
        display: block;
        top: 5%;
        right: -7%;
      }

      .p0,
      .p1,
      .p2,
      .p3,
      .p4 {
        justify-content: flex-end;
        width: 100px;
        border-radius: 0 5px 5px 0;
        transform: matrix(1, 0, 0, 1, 0, 0);
        transition: transform .5s 0s ease;
      }

      .p1:hover,
      .p2:hover,
      .p3:hover,
      .p4:hover {
        transform: matrix(0.8, -0.25, 0, 1, 0, -10);
      }

      .bg1,
      .bg2,
      .bg3,
      .bg4 {
        display: block;
      }

      .bg1 {
        left: -10%;
        top: -40%;
      }

      .bg2 {
        top: -20%;
        right: -5%;
        height: 40vh;
      }

      .bg3 {
        right: -3%;
        bottom: -10%;
        height: 24vh;
      }

      .bg4 {
        bottom: -5%;
        height: 17vh;
        right: 70%;
      }

      .book {
        width: 100%;
        height: 73%;
        background: url(https://i.postimg.cc/D0VLb3fc/bgbook.png) no-repeat center center;
        background-size: 100% 100%;
        position: relative;
      }

      .content {
        display: flex;
        flex-wrap: wrap;
        width: 96%;
        height: 99%;
        margin: .5% 2.5%;
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
        display: block;
        top: 5%;
        right: -6%;
      }

      .p0,
      .p1,
      .p2,
      .p3,
      .p4 {
        justify-content: flex-end;
        width: 100px;
        border-radius: 0 5px 5px 0;
        transform: matrix(1, 0, 0, 1, 0, 0);
        transition: transform .5s 0s ease;
      }

      .p1:hover,
      .p2:hover,
      .p3:hover,
      .p4:hover {
        transform: matrix(0.8, -0.25, 0, 1, 0, -10);
      }

      .bg1,
      .bg2,
      .bg3,
      .bg4 {
        display: block;
      }

      .bg1 {
        left: -10%;
        top: -40%;
      }

      .bg2 {
        top: -20%;
        right: -5%;
        height: 40vh;
      }

      .bg3 {
        right: -3%;
        bottom: -10%;
        height: 24vh;
      }

      .bg4 {
        bottom: -5%;
        height: 17vh;
        right: 70%;
      }

      .book {
        width: 100%;
        height: 73%;
        background: url(https://i.postimg.cc/D0VLb3fc/bgbook.png) no-repeat center center;
        background-size: 100% 100%;
        position: relative;
      }

      .content {
        display: flex;
        flex-wrap: wrap;
        width: 97%;
        height: 99%;
        width: 96%;
        margin: .5% 2.5%;
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

    @media screen and (min-width: 1400px) {
      .path1 {
        display: block;
        top: 5%;
        right: -5%;
      }

      .p0,
      .p1,
      .p2,
      .p3,
      .p4 {
        justify-content: flex-end;
        width: 100px;
        border-radius: 0 5px 5px 0;
        transform: matrix(1, 0, 0, 1, 0, 0);
        transition: transform .5s 0s ease;
      }

      .p1:hover,
      .p2:hover,
      .p3:hover,
      .p4:hover {
        transform: matrix(0.8, -0.25, 0, 1, 0, -10);
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
        height: 40vh;
      }

      .bg3 {
        right: -3%;
        bottom: -10%;
        height: 24vh;
      }

      .bg4 {
        bottom: -5%;
        height: 17vh;
        right: 70%;
      }

      .container {
        display: flex;
        align-items: center;
        height: 100vh;
      }

      .book {
        width: 100%;
        height: 75%;
        background: url(https://i.postimg.cc/D0VLb3fc/bgbook.png) no-repeat center center;
        background-size: 100% 100%;
        position: relative;
      }

      .content {
        display: flex;
        flex-wrap: wrap;
        width: 97%;
        height: 99%;
        width: 96%;
        margin: .5% 2.5%;
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
  </style>
</head>

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
        1 => "1,2月",
        2 => "3,4月",
        3 => "5,6月",
        4 => "7,8月",
        5 => "9,10月",
        6 => "11,12月",
      ];
      $m = ceil(date("m") / 2);
      ?>
      <div class="path1">
        <div class="p0 text-light bg-secondary mb-1"><?= $month[$m]; ?></div>
        <div class="p1 bg-success mb-1"><a href="?do=invoice_list">當期發票</a></div>
        <div class="p2 bg-danger mb-1"><a href="?do=award_numbers">全期對獎</a></div>
        <div class="p1 bg-primary mb-1"><a href="?in=main">輸入發票</a></div>
        <div class="p3 bg-warning mb-1"><a href="?in=add_awards">輸入獎號</a></div>
        <div class="p4 bg-dark mb-1"><a href="index.php">闔上</a></div>
      </div>
      <div class="content">
        <div class="content-l col-12 col-lg-6">
          <!-- <img class="bgl" src="https://i.postimg.cc/52mpz3rC/left-bg.jpg" alt=""> -->
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