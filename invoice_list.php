<?php
//資料分頁
$pageSize = 15; //每頁幾條紀錄
$rowCount = $pdo->query("select count(period) from `invoices` where period='$period'")->fetch(); //共幾條紀錄

$pageNow = 1; //顯示第幾頁
$pageCount = ceil($rowCount[0] / $pageSize); //共多少頁
if (!empty($_GET['pageNow'])) {
    $pageNow = $_GET['pageNow'];
}
$pageStart = ($pageNow - 1) * $pageSize; //目前頁面

$sql = "select * from `invoices` where period='$period' Order by date desc limit $pageStart,$pageSize";
// $sql="select * from `invoices` order by date desc";

$rows = $pdo->query($sql)->fetchall();

// foreach($rows as $row){
//     echo $row['code']."-".$row['number']."<br>";
// }
?>
<div class="rightPage h-100 d-flex flex-column justify-content-between">
    <div class="path d-flex justify-content-evenly">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb w-100">
                <li class="breadcrumb-item"><a href="?p=1">1-2月</a></li>
                <li class="breadcrumb-item"><a href="?p=2">3-4月</a></li>
                <li class="breadcrumb-item"><a href="?p=3">5-6月</a></li>
                <li class="breadcrumb-item"><a href="?p=4">7-8月</a></li>
                <li class="breadcrumb-item"><a href="?p=5">9-10月</a></li>
                <li class="breadcrumb-item"><a href="?p=6">11-12月</a></li>
            </ol>
        </nav>
    </div>

    <div class="tit d-flex w-100 my-3">
        <div class="t1 text-center">發票號碼</div>
        <div class="t2 text-center">消費日期</div>
        <div class="t3 text-center">金額</div>
        <div class="t4 text-center">操作</div>
    </div>

    <div class="inv">
        <div class="invoices w-100">
            <?php
            foreach ($rows as $row) {
            ?>
                <div class="invoice d-flex flex-wrap">
                    <div class="t1 text-center"><?= $row['code'] . "-" . $row['number'] ?></div>
                    <div class="t2 text-center"><?= $row['date'] ?></div>
                    <div class="t3 text-center"><?= $row['payment'] ?></div>
                    <div class="t4 text-center">
                        <a href="?do=edit_invoice&id=<?= $row['id']; ?>">
                            <button type="button" data-toggle="tooltip" data-placement="top" title="編輯" class="btn btn-sm btn-outline-warning">
                                <p class="far fa-edit"></p>
                            </button>
                        </a>
                        <a href="?do=del_invioce&id=<?= $row['id']; ?>"><button type="button" data-toggle="tooltip" data-placement="top" title="刪除" class="btn btn-sm btn-outline-danger">
                                <p class="fas fa-trash-alt"></p>
                            </button>
                        </a>
                        <a href="?do=award&id=<?= $row['id']; ?>"><button type="button" data-toggle="tooltip" data-placement="top" title="對獎" class="btn btn-sm btn-outline-success">
                                <p class="fas fa-medal"></p>
                            </button>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- <div class="page pagination justify-content-center align-items-end">
        <li class="page-item">
            <a class="page-link" href="?pageNow=<?= $pageNow = 1; ?>&p=<?= $period; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        for ($i = 1; $i <= $pageCount; $i++) {
            echo "<li class='page-item'>";
            echo "<a href='?pageNow=$i&p=$period' class='page-link'>$i</a> "; //[列印出頁碼的超連結]
        }
        ?>
        <li class="page-item">
            <a class="page-link" href="?pageNow=<?= $pageNow = $pageCount; ?>&p=<?= $period; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </div> -->
    <form action="index.php" method="get">
        <input type="hidden" name="p" value="<?=$period?>" >
        <select name="pageNow" onchange="submit();">
            <?php
            for ($i = 1; $i <= $pageCount; $i++) {
                echo "<option value='$i'>".$i."</option>";
            }
            ?>
        </select>
        <!-- <input type="submit" value="送出"> -->
    </form>
</div>