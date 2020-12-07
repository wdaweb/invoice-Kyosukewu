<?php
    session_start();
    session_destroy();
    // setcookie("login",'',-100);
    header("location:index.php");
    ?>