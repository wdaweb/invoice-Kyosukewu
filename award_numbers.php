<?php
include_once("base.php");
$get_new = $pdo->query("select * from `award_numbers` order by year desc,period desc limit 1")->fetch();
$nyear = $get_new['year'];
$nperiod = $get_new['period'];

$year =  !empty($_GET['pd']) ? explode("-", $_GET['pd'])[0] : $nyear;
$period = !empty($_GET['pd']) ? explode("-", $_GET['pd'])[1] : $nperiod;
$awards = $pdo->query("select * from award_numbers where year='$year' && period='$period'")->fetchALL();
$special = "";
$grand = "";
$first = [];
$six = [];

foreach ($awards as $aw) {
    switch ($aw['type']) {
        case 1:
            $special = $aw['number'];
            break;
        case 2:
            $grand = $aw['number'];
            break;
        case 3:
            $first[] = $aw['number'];
            break;
        case 4:
            $six[] = $aw['number'];
            break;
    }
}

?>
<div class="row">
    <div class="d-flex justify-content-around mb-3">
        <a href="?do=award_numbers&pd=2020-1">1,2月</a>
        <a href="?do=award_numbers&pd=2020-2">3,4月</a>
        <a href="?do=award_numbers&pd=2020-3">5,6月</a>
        <a href="?do=award_numbers&pd=2020-4">7,8月</a>
        <a href="?do=award_numbers&pd=2020-5">9,10月</a>
        <a href="?do=award_numbers&pd=2020-6">11,12月</a>
    </div>

    <table class="tabl table-sm">
        <tbody>
            <tr>
                <td>年月份</td>
                <td headers="montds" class="title">
                    <?= $year; ?>年
                    <?php
                    $montd = [
                        1 => "01 ~ 02",
                        2 => "03 ~ 04",
                        3 => "05 ~ 06",
                        4 => "07 ~ 08",
                        5 => "09 ~ 10",
                        6 => "11 ~ 12",
                    ];
                    echo $montd[$period];
                    ?>月
                </td>
            </tr>
            <tr>
                <td id="specialPrize" rowspan="2">特別獎</td>
                <td headers="specialPrize"> 同期統一發票收執聯<span class="text-danger">8位數號碼</span>與特別獎號碼相同者獎金1,000萬元 </td>
            </tr>
            <tr>
                <td headers="specialPrize" class="number">
                    <?= $special; ?>
                </td>
            </tr>
            <tr>
                <td id="grandPrize" rowspan="2">特獎</td>
                <td headers="grandPrize"> 同期統一發票收執聯<span class="text-danger">8位數號碼</span>與特獎號碼相同者獎金200萬元 </td>
            </tr>
            <tr>
                <td headers="grandPrize" class="number">
                    <?= $grand; ?>
                </td>
            </tr>
            <tr>
                <td id="firstPrize" rowspan="2">頭獎</td>
                <td> 同期統一發票收執聯<span class="text-danger">8位數號碼</span>與頭獎號碼相同者獎金20萬元 </td>
            </tr>
            <tr>
                <td headers="firstPrize" class="number">
                    <?php
                    foreach ($first as $f) {
                        echo $f . "<br>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td id="twoPrize">二獎</td>
                <td> 同期統一發票收執聯末7 位數號碼與頭獎中獎號碼<span class="text-danger">末7位</span>相同者各得獎金4萬元 </td>
            </tr>
            <tr>
                <td id="tdreePrize">三獎</td>
                <td> 同期統一發票收執聯末6 位數號碼與頭獎中獎號碼<span class="text-danger">末6位</span>相同者各得獎金1萬元 </td>
            </tr>
            <tr>
                <td id="fourPrize">四獎</td>
                <td> 同期統一發票收執聯末5 位數號碼與頭獎中獎號碼<span class="text-danger">末5位</span>相同者各得獎金4千元 </td>
            </tr>
            <tr>
                <td id="fivePrize">五獎</td>
                <td> 同期統一發票收執聯末4 位數號碼與頭獎中獎號碼<span class="text-danger">末4位</span>相同者各得獎金1千元 </td>
            </tr>
            <tr>
                <td id="sixPrize">六獎</td>
                <td> 同期統一發票收執聯末3 位數號碼與頭獎中獎號碼<span class="text-danger">末3位</span>相同者各得獎金2百元 </td>
            </tr>
            <tr>
                <td id="addSixPrize">增開六獎</td>
                <td class="number">
                    <?php
                    foreach ($six as $s) {
                        echo $s . "&nbsp&nbsp&nbsp";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <a class="mx-auto" href="?do=all_awards&year=<?= $year ?>&period=<?= $period ?>">
        <button class="btn btn-success">對獎</button></a>
</div>