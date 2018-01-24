<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>한놈두식이</title>
    <link rel="shortcut icon" type="image/x-icon" href="./img/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/main.css?v=<?= rand(1, 100) ?>">
    <script type="text/javascript" src="./ckeditor_4.8.0_full/ckeditor/ckeditor.js"></script>
    <script>
        $(function() {
            $("#logo").click(function() {
                location.href = "index.php";
            });
            $('[data-toggle="navPath"]').click(function() {
            location.href='/board.php?category=' + $(this).data('value');
            });
        })

    </script>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
</head>

<body>
    <nav class="image navbar navbar-expand-md bg-primary navbar-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" id="logo" href="#">
            <img class="navbar-brand" src="./img/logo.png" style="width:60px;">
        </a>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav menu mr-auto menu">
                <li class="nav-item">
                    <a class='nav-link' href="../boardAll.php">통합게시판</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link" data-toggle='navPath' data-value="월택/분실">월택/분실</span>
                </li>
                <li class="nav-item">
                    <span class="nav-link" data-toggle='navPath' data-value="과팅">과팅</span>
                </li>
                <li class="nav-item">
                    <span class="nav-link" data-toggle='navPath' data-value="시험족보">시험족보</span>
                </li>
                <li class="nav-item">
                    <span class="nav-link" data-toggle='navPath' data-value="스포츠">스포츠</span>
                </li>
                <li class="nav-item">
                    <span class="nav-link" data-toggle='navPath' data-value="밥한끼">밥한끼</span>
                </li>
                <li class="nav-item navbar-right">
                    <span class="nav-link" data-toggle='navPath' data-value="대나무숲(익명글)">대나무숲(익명글)</span>
                </li>
            </ul>
            <?php
             include 'back/login.php';
             ?>
        </div>
    </nav>
