<form action="api/add_award_number.php" method="post" class="h-100 overflow-auto">
<table class="mtable col-12 col-md-8 mx-auto">
<tdead>
        <tr>
            <td colspan="2" class="h3 text-center pb-1 pb-md-3 border-bottom">統一發票獎號輸入</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="ll pt-2 pt-md-3 pr-3">年月份</td>
            <td  class="pt-2 pt-md-3">
                <input style="width:25%;" type="number" name="year" min="<?=date("Y")-1;?>" max="<?=date("Y")+1;?>" step="1" value="<?=date("Y");?>">年
                <select name="period" style="width:35%;">
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
                <input type="number" name="special_prize" min="00000000" max="99999999" class="w-100">
                <?php errFeedBack('special_prize'); ?>
            </td>
        </tr>
        <tr>
            <td class="ll pt-3 pr-3">特獎</td>
            <td class="pt-3">
            <input type="number" name="grand_prize" min="00000000" max="99999999" class="w-100"><?php errFeedBack('grand_prize'); ?>
            </td>
        </tr>
        <tr>
            <td class="ll pt-3 pr-3">頭獎</td>
            <td class="pt-3">
            <input type="number" name="first_prize[]" min="00000000" max="99999999" class="w-100 mt-2  col-md-3">
            <input type="number" name="first_prize[]" min="00000000" max="99999999"  class="w-100 mt-2 col-md-3">
            <input type="number" name="first_prize[]" min="00000000" max="99999999"  class="w-100 mt-2 col-md-3">
            </td>
        </tr>
        <tr>
            <td class="ll pt-3 pr-3">增開六獎</td>
            <td class="pt-3">
            <input type="number" name="add_prize[]" min="000" max="999" class="six">
            <input type="number" name="add_prize[]" min="000" max="999" class="six">
            <input type="number" name="add_prize[]" min="000" max="999" class="six">
            </td>
        </tr>
    </tbody>
</table>
<div class="send text-center mt-3">
<input class="btn btn-outline-dark" type="submit" value="儲存">
<input class="btn btn-outline-secondary" type="reset" value="清空">
</div>
</form>