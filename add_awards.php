<form action="api/add_award_number.php" method="post">
<table class="col-12 col-md-10  mx-auto" summary="統一發票中獎號碼單">
<tdead>
        <tr>
            <td colspan="2" class="h3 text-center pb-3 border-bottom">統一發票獎號輸入</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="ll pt-3 pr-3 col-3">年月份</td>
            <td  class="pt-3">
                <input class="" type="number" name="year" min="<?=date("Y")-1;?>" max="<?=date("Y")+1;?>" step="1" value="<?=date("Y");?>">年
                <select name="period" class="w-25">
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
            <td class="ll pt-3 pr-3">特別獎</td>
            <td class="pt-3">
                <input type="number" name="special_prize" min="00000000" max="99999999" class="col-9">
                <?php errFeedBack('special_prize'); ?>
            </td>
        </tr>
        <tr>
            <td class="ll pt-3 pr-3">特獎</td>
            <td class="pt-3">
            <input type="number" name="grand_prize" min="00000000" max="99999999" class="col-9"><?php errFeedBack('grand_prize'); ?>
            </td>
        </tr>
        <tr>
            <td class="ll pt-3 pr-3">頭獎</td>
            <td class="pt-3">
            <input type="number" name="first_prize[]" min="00000000" max="99999999" class="col-3">
            <input type="number" name="first_prize[]" min="00000000" max="99999999"  class="col-3">
            <input type="number" name="first_prize[]" min="00000000" max="99999999"  class="col-3">
            </td>
        </tr>
        <tr>
            <td class="ll pt-3 pr-3">增開六獎</td>
            <td class="pt-3">
            <input type="number" name="add_prize[]" min="000" max="999" class="col-3">
            <input type="number" name="add_prize[]" min="000" max="999" class="col-3">
            <input type="number" name="add_prize[]" min="000" max="999" class="col-3">
            </td>
        </tr>
    </tbody>
</table>
<div class="send text-center mt-3">
<input class="btn btn-outline-dark" type="submit" value="儲存">
<input class="btn btn-outline-secondary" type="reset" value="清空">
</div>
</form>