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
    <div class="container">
        <div class="book">
            <div class="path1">
                <div class="p2 bg-danger mb-1"><a href="index.php">登入</a></div>
            </div>
            <div class="content">
                <div class="content-l col-12 col-lg-6"></div>
                <div class="content-r col-12 col-lg-6">
                    <div class="card-img-overlay">
                        <?php
                         ob_start();
                         if (isset($_GET['do'])) {
                           $file = $_GET['do'] . ".php";
                           include $file;
                         } else {
                             include "award_numbers_v.php";
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