<?php include_once("base.php") ?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/reset.css"> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
  <!-- <script src="https://kit.fontawesome.com/a1381bb91e.js" crossorigin="anonymous"></script> -->
  <title>統一發票紀錄及對獎系統</title>
  <!-- add js -->
  <script src="js/jquery.js"></script>
  <script src="js/turn.js"></script>
  <script src="js/jquery.address-1.6.min.js"></script>
  <script src="js/onload.js"></script>
  <style>
    body{
      background: url(images/bg.jpg);
      background-size: cover;
    }
    .fb7-shadow {
      height: 100%;
      position: absolute;
      top: 0px;
      box-shadow: 0px 0px 10px 1px #999;
      border-top-left-radius: 25px;
      border-bottom-left-radius: 25px;
      border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
    }

    .fb7-shadow-double {
      width: 100%;
      left: 0%;
    }

    .fb7-shadow-right {
      width: 50%;
      left: 50%;
      border-top-left-radius: 0px !important;
      border-bottom-left-radius: 0px !important;
    }

    .fb7-shadow-left {
      width: 50%;
      left: 0%;
      border-top-right-radius: 0px !important;
      border-bottom-right-radius: 0px !important;
    }


    .turn-page.even .fb7-cont-page-book {
      background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.27) 0%, rgba(255, 255, 255, 0) 7%);
    }

    .turn-page.odd .fb7-cont-page-book {
      background: -webkit-linear-gradient(right, rgba(0, 0, 0, 0.27) 0%, rgba(255, 255, 255, 0) 7%);
    }

    #fb7-container-book {
      position: absolute;
      z-index: 5;
      display: none;
      width: 1280px;
      height: 920px;
    }

    #fb7-deeplinking {
      display: none;
    }


    #fb7-book {
      position: relative;
      z-index: 10;
      width: 100%;
      height: 100%;
    }

    #fb7-book .turn-page {
      background-color: #FFF;
      background-size: 100% 100%;
    }

    .fb7-nav-arrow {
      position: absolute;
      top: 50%;
      z-index: 15;
      width: 158px;
      height: 100px;
      margin-top: -50px;
      cursor: pointer;
    }

    .next {
      background: url(images/right.svg) no-repeat;
    }

    .prev {
      background: url(images/left.svg) no-repeat;
    }

    .fb7-shadow {
      border-top-left-radius: 0px;
      border-bottom-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-right-radius: 0px;
    }
    .path1{
      width: 100px;
    }
    .p1,.p2,.p3,.p4{
      display: flex;
      align-items: center;
      justify-content: flex-end;
      height: 40px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }
    .path1 a{
      padding: 10px;
      color: #FFF;
      text-decoration: none;
    }
  </style>

</head>

<body>
  <?php
  $month = [
    1 => "1,2月",
    2 => "3,4月",
    3 => "5,6月",
    4 => "7,8月",
    5 => "9,10月",
    6 => "11,12月",
  ];

  $m = ceil(date("m") / 2);

  ?>

  <div class="text-center"><?= $month[$m]; ?></div>

  <div class="path1">
    <div class="p1 bg-danger mb-3"><a href="javascript:setPage(2)">當期發票</a></div>
    <div class="p2 bg-success mb-3"><a href="javascript:setPage(4)">對獎</a></div>
    <div class="p3 bg-warning mb-3"><a href="javascript:setPage(6)">輸入獎號</a></div>
    <div class="p4 bg-dark mb-3"><a href="javascript:setPage(1)">關上</a></div>
  </div>
  <div data-template="true" id="fb7-ajax">

    <div data-current="book7" class="fb7" id="fb7">
      <div id="fb7-container-book">

        <!-- arrows -->
        <div class="fb7-nav-arrow prev"></div>
        <div class="fb7-nav-arrow next"></div>
        <section id="fb7-deeplinking">
          <ul>
            <li data-address="page1" data-page="1"></li>
            <li data-address="page2-page3" data-page="2"></li>
            <li data-address="page2-page3" data-page="3"></li>
            <li data-address="page4-5" data-page="4"></li>
            <li data-address="page4-5" data-page="5"></li>
            <li data-address="page6-page7" data-page="6"></li>
            <li data-address="page6-page7" data-page="7"></li>
            <li data-address="page8-page9" data-page="8"></li>
            <li data-address="page8-page9" data-page="9"></li>
            <li data-address="end" data-page="10"></li>
          </ul>
        </section>
        <div id="fb7-book">
          <!-- BEGIN PAGE 1 -->
          <div style="background-image:url(images/1.jpg)" class="fb7-noshadow">
            <!-- begin container page book -->
            <div class="fb7-cont-page-book">
              <!-- description for page -->
              <div class="fb7-page-book">
              </div>
            </div>
            <!-- end container page book -->
          </div>
          <!-- END PAGE 1 -->
          <!-- BEGIN PAGE 2 -->
          <div style="background-image:url()">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page  -->
              <div class="fb7-page-book">
                <h1>當前發票</h1>

              </div>
              <!-- end number page -->

            </div>
            <!-- end container page book -->

          </div>
          <!-- END PAGE 2 -->


          <!-- BEGIN PAGE 3 -->
          <div style="background-image:url(images/3.jpg)">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page-->
              <div class="fb7-page-book">
              <?php
        if (isset($_GET['do'])){
            $file = $_GET['do'] . ".php";
            include $file;
        } else {
            include "main.php";
        }
        ?>
              </div>
              <!-- end number page  -->


            </div>
            <!-- end container page book -->

          </div>
          <!-- END PAGE 3 -->


          <!-- BEGIN PAGE 4-5 -->
          <div style="background-image:url(images/4_5.jpg)" class="fb7-double fb7-first fb7-noshadow">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page -->
              <div class="fb7-page-book">
              <h1>對獎</h1>
              </div>

            </div>
            <!-- end container page book -->

          </div>


          <div style="background-image:url(images/4_5.jpg)" class="fb7-double fb7-second fb7-noshadow">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page -->
              <div class="fb7-page-book">

              </div>

            </div>
            <!-- end container page book -->

          </div>
          <!-- END PAGE 4-5 -->


          <!-- BEGIN PAGE 6 -->
          <div style="background-image:url()">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page -->
              <div class="fb7-page-book">
              <h1>輸入獎號</h1>
              </div>
              <!-- end number page  -->

            </div>
            <!-- end container page book -->

          </div>
          <!-- END PAGE 6 -->


          <!-- BEGIN PAGE 7 -->
          <div style="background-image:url(images/6.jpg)">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page  -->
              <div class="fb7-page-book">
                <h1>內容標題</h1>
                <p>內容區</p>
              </div>
            </div>

          </div>
          <!-- END PAGE 7 -->


          <!-- BEGIN PAGE 8 -->
          <div style="background-image:url()">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page -->
              <div class="fb7-page-book">
                <h1>Vis id quas novum</h1>
                <p>Cu modus putent partiendo duo. Mel id nonumy iisque. Vis ex labitur gloriatur, no qui iusto albucius.
                  Tantas nominavi conceptam ius in, mel posse choro cu.</p>
              </div>
            </div>
          </div>
          <!-- END PAGE 8 -->




          <!-- BEGIN PAGE 9 -->
          <div style="background-image:url(images/9.jpg)">
            <!--書頁陰影 -->
            <div class="fb7-cont-page-book">
            </div>
            <!-- end container page book -->
          </div>
          <!-- END PAGE 9 -->


          <!-- BEGIN PAGE 10 -->
          <div style="background-image:url()">

            <!-- begin container page book -->
            <div class="fb7-cont-page-book">

              <!-- description for page-->
              <div class="fb7-page-book">
                <h1>THE END</h1>
              </div>

            </div>
            <!-- end container page book -->

          </div>
          <!-- END PAGE 10 -->
        </div>
        <!-- END PAGES -->
        <!-- shadow -->
        <div class="fb7-shadow"></div>
      </div>
      <!-- END CONTAINER BOOK -->
    </div>
  </div>
  <script>
    jQuery('#fb7-ajax').data('config', {
      "page_width": "500",
      "page_height": "700",
      "go_to_page": "Page",
      "gotopage_width": "45",
      "deeplinking_enabled": "true",
      "double_click_enabled": "true",
      "rtl": "false"
    })
  </script>


</body>

</html>
<?php $_SESSION['err']=[];?>