<?php include_once("base.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <title>統一發票紀錄及對獎系統</title>
    <style type="text/css">
        body {
            width: 100vw;
            height: 100vh;
            background: url(images/bg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }

        .container {
            position: relative;
        }

        .path1 {
            width: 100px;
            position: absolute;
        }

        .p0,
        .p1,
        .p2,
        .p3,
        .p4 {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            height: 40px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            box-shadow: 5px 5px 10px #333;
            transform: matrix(1, 0, 0, 1, 0, 0);
            transition: transform .5s 0s ease;
        }

        .p1:hover,
        .p2:hover,
        .p3:hover,
        .p4:hover {
            transform: matrix(0.8, -0.25, 0, 1, 0, 0);
            /* transform: scale(1.1,1.1); */
        }

        .path1 a,.p0 {
            padding: 10px;
            color: #FFF;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="">統一發票紀錄與對獎</div>
        <div class="">
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
                <div class="p0 text-secondary bg-light mb-1"><?= $month[$m]; ?></div>
                <div class="p1 bg-danger mb-1"><a href="?do=invoice_list">當期發票</a></div>
                <div class="p2 bg-success mb-1"><a href="?do=award_numbers">對獎</a></div>
                <div class="p3 bg-warning mb-1"><a href="?do=add_awards">輸入獎號</a></div>
                <div class="p4 bg-dark mb-1"><a href="index.php">闔上</a></div>
            </div>
            <div class="">
                <?php
                if (isset($_GET['do'])) {
                    $file = $_GET['do'] . ".php";
                    include $file;
                } else {
                    include "main.php";
                }
                ?>
            </div>
        </div>
</body>

</html>
<?php $_SESSION['err'] = []; ?>