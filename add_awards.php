<form action="api/add_award_number.php" method="post">
<table class="table table-bordered table-sm" summary="統一發票中獎號碼單">
<tdead>
        <tr>
            <td colspan="2" class="h3 text-center pb-3 border-bottom">統一發票獎號輸入</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td id="months">年月份</td>
            <td headers="months" class="title">
                <input type="number" name="year" min="<?=date("Y")-1;?>" max="<?=date("Y")+1;?>" step="1" value="<?=date("Y");?>">年
                <select name="period" id="">
                <option value="1">01~02</option>
                <option value="2">03~04</option>
                <option value="3">05~06</option>
                <option value="4">07~08</option>
                <option value="5">09~10</option>
                <option value="6">11~12</option>
                </select>月
            </td>
        </tr>
        <tr>
            <td id="specialPrize" rowspan="2">特別獎</td>
            <td headers="specialPrize" class="number">
                <input type="number" name="special_prize" min="00000000" max="99999999">
                <?php errFeedBack('special_prize'); ?>
            </td>
        </tr>
        <tr>
            <td hidden headers="specialPrize"> 同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元 </td>
        </tr>
        <tr>
            <td id="grandPrize" rowspan="2">特獎</td>
            <td headers="grandPrize" class="number">
            <input type="number" name="grand_prize" min="00000000" max="99999999"><?php errFeedBack('grand_prize'); ?>
            </td>
        </tr>
        <tr>
            <td hidden headers="grandPrize"> 同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元 </td>
        </tr>
        <tr>
            <td id="firstPrize" rowspan="2">頭獎</td>
            <td headers="firstPrize" class="number">
            <input type="number" name="first_prize[]" min="00000000" max="99999999">
            <input type="number" name="first_prize[]" min="00000000" max="99999999">
            <input type="number" name="first_prize[]" min="00000000" max="99999999">
            </td>
        </tr>
        <tr>
            <td hidden headers="firstPrize"> 同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元 </td>
        </tr>
        <tr hidden>
            <td id="twoPrize">二獎</td>
            <td hidden headers="twoPrize"> 同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元 </td>
        </tr>
        <tr hidden>
            <td id="threePrize">三獎</td>
            <td hidden headers="threeAwards"> 同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元 </td>
        </tr>
        <tr hidden>
            <td id="fourPrize">四獎</td>
            <td hidden headers="fourPrizes"> 同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元 </td>
        </tr>
        <tr hidden>
            <td id="fivePrize">五獎</td>
            <td hidden headers="fivePrize"> 同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元 </td>
        </tr>
        <tr hidden>
            <td id="sixPrize">六獎</td>
            <td headers="sixPrize"> 同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元 </td>
        </tr>
        <tr>
            <td id="addSixPrize">增開六獎</td>
            <td headers="addSixPrize" class="number">
            <input type="number" name="add_prize[]" min="000" max="999">
            <input type="number" name="add_prize[]" min="000" max="999">
            <input type="number" name="add_prize[]" min="000" max="999">
            </td>
        </tr>
    </tbody>
</table>
<input class="btn btn-primary" type="submit" value="儲存">
<input class="btn btn-dark" type="reset" value="清空">
</form>