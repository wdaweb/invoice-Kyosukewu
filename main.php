<div class="container">
    <div class="h3 text-center">統一發票紀錄與對獎</div>

    <div class="content">
        <div class="col-8 d-flex justify-content-between mx-auto border p-3">
        <?php
        $month=[
            1=>"1,2月",
            2=>"3,4月",
            3=>"5,6月",
            4=>"7,8月",
            5=>"9,10月",
            6=>"11,12月"
        ];
        $m=ceil(date('m')/2);

        ?>
            <div class="text-center"><?=$month[$m];?></div>
            <div class="text-center">
               <a href="">當期發票</a>
            </div>
            <div class="text-center">
            <a href="">對獎</a>    
            </div>
            <div class="text-center">
            <a href="">輸入獎號</a>
            </div>
        </div>
        <div class="col-8 d-flex justify-content-between mx-auto border p-3">
            <form action="api/add_invoice.php" method="post">
            <div>年份：<input type="text" name="year"></div>
                期別：<select name="period" id="">
                    <option value="1">1,2月</option>
                    <option value="2">3,4月</option>
                    <option value="3">5,6月</option>
                    <option value="4">7,8月</option>
                    <option value="5">9,10月</option>
                    <option value="6">11,12月</option>
                </select>
            <div class="">發票號碼：
                <input type="text" name="prepend" style="width: 40px;">
                <input type="text" name="number">
            </div>
            <div class="">發票金額：
                <input type="number" name="payment">
            </div>
            <div class="text-center mt-2">
                <input type="submit" value="送出" name="" id="">
            </div>
            </form>
        </div>
    </div>


</div>