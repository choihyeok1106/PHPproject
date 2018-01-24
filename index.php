<?php
include './nf/nav.php';
include './js/cal.php';
include './js/cal2.php';


session_start();?>


    <div class="container">
        <?php
        if ( isset($_SESSION['user']))  { ?>
        <p>로그인 상태입니다.</p>
        <p>다른 아이디로 로그인을 하시려면 다시 시작해주세요</p>
        <?php }?>
        <div class="jumbotron">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner" id="silde">
                    <div class="carousel-item active">
                        <div id='calendar'>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <a href="#"><img src="./img/silde1.jpg"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="https://kiss.doowon.ac.kr/"><img src="./img/silde2.png"></a>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                 </a>
            </div>
        </div>
    </div>
    <?php
include './nf/footer.php';
?>
