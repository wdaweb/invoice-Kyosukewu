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
        <div class="bookindex">
            <?php
            include_once "base.php";
            if (isset($_SESSION['login'])) {
                $sql_user = "select `member`.`role`,`login`.`acc` from member,login where `member`.`login_id`=`login`.`id` &&  acc='{$_SESSION['login']}'";
                $user = $pdo->query($sql_user)->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            <div class="login text-center">
                <form action="check.php" class="" method="post">
                    <div class="text-light mb-2 mb-md-3">帳號：<input type="text" name="acc" class="inp"></div>
                    <div class="text-light">密碼：<input type="password" name="pw" class="inp"></div>
                    <small class="text-center text-danger"><?php if (isset($_GET['meg'])) {
                                                                echo $_GET['meg'];
                                                            } ?></small>
                    <div class="fog my-md-2">
                        <a href="forget.php"><small>忘記密碼?</small></a>
                        <a href="register.php" class="ml-2"><small>註冊新帳號</small></a>
                    </div>
                    <p class="text-center mt-1"><input class="btn btn-outline-light" type="submit" value="登入"><a href="visitor.php" class="btn btn-outline-light ml-3">訪客模式</a></p>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['email'])) {
        $sql = "select * from login where email='{$_POST['email']}'";
        $chk = $pdo->query($sql)->fetch();
        // echo "<pre>";
        // print_r($chk);
        // echo "</pre>";
        if (!empty($chk)) {
            $res = "<div>您的密碼是：<span class='text-danger'>".$chk['pw']."</span> 請妥善保存</div>";
        } else {
            $res = "<span class='text-danger'>查無此人</span>";
        }
    }
    ?>
    <div class="overreg">
        <div class="title bg-dark">
            <p class="text-white">找回密碼</p>
            <a href="index.php"><i class="fas fa-times"></i></a>
        </div>
        <div class="edit text-center">
            <form action="?" method="post">
                <div class="mainedit mb-2 justify-content-center">
                    <div class="text-center">
                        <input class="input-group-text" type="text" name="email" placeholder="請輸入E-mail查詢">
                        <input type="submit" value="查詢" class="btn btn-sm btn-outline-dark my-3">
                        <div class="w-100">
                        <?php
                        if (isset($res)) {
                            echo $res;
                        };
                        ?>
                    </div>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php $_SESSION['err'] = []; ?>