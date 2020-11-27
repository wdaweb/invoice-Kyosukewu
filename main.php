<form class="mf" action="api/add_invoice.php" method="post">
    <table class="mtb col-12 col-md-8  mx-auto my-auto">
        <thead>
            <tr>
                <td colspan="2" class="h3 text-center pb-md-3 border-bottom">統一發票紀錄</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="ll pt-3 pr-3">日期</td>
                <td class="pt-3"><input class="w-100" type="date" name="date"></td>
            </tr>
            <tr>
                <td class="ll pt-3 pr-3">期別</td>
                <td class="pt-3"><select name="period" class="w-100">
                        <option value="1">1,2月</option>
                        <option value="2">3,4月</option>
                        <option value="3">5,6月</option>
                        <option value="4">7,8月</option>
                        <option value="5">9,10月</option>
                        <option value="6">11,12月</option>
                    </select></td>
            </tr>
            <tr>
                <td class="ll pt-3 pr-3">發票號碼</td>
                <td class="pt-3"><input type="text" name="code" style="width:20%;text-transform:uppercase;" maxlength="2"> -
                    <input type="number" name="number" style="width:70%;">
                    <?php errFeedBack('code'); ?><?php errFeedBack('number'); ?></td>
            </tr>
            <tr>
                <td class="ll pt-3 pr-3">發票金額</td>
                <td class="pt-3"><input type="number" name="payment" class="w-100"><?php errFeedBack('payment'); ?></td>

            </tr>
        </tbody>
    </table>
    <div class="text-center mt-2">
        <input class="btn btn-outline-success" type="submit" value="送出">
    </div>
</form>