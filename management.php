<div class="control d-flex justify-content-center">
    <a class="btn btn-outline-secondary btn-sm" href="?in=management&inside=add_awards">新增獎號</a>
    <a class="btn btn-outline-secondary btn-sm ml-3" href="?in=management&inside=m_user">用戶管理</a>
</div>

<div class="inside mt-1 pt-2 overflow-auto">
    <?php
    ob_start();
    if (isset($_GET['inside'])) {
        $file = $_GET['inside'] . ".php";
        include $file;
    } else {
        include "add_awards.php";
    }
    ?>
</div>