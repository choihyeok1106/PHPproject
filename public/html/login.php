<?php include './common/head.php' ?>
<script type="text/javascript">
    window.onload = function () {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/pages/css/windows.chrome.fix.css" />'
    }
</script>
<body class="fixed-header ">
<div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
        <!-- START Background Pic-->
        <div class="login-bg" style="background-image: url('https://livepure.com/img/vidthumb.jpg')">
            <video id="heroVid" playsinline="" autoplay="" muted="" loop="">
                <source src="https://livepure.com/img/vidhero2render.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            <h2 class="semi-bold text-white">
                People United</h2>
            <p class="small">
                PURE is devoted to globally empowering people to become the best version of themselves through innovative products and financial
                opportunity.
            </p>
        </div>
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="login-wrap">
            <div class="login-form">
                <a href="/html">
                    <img src="/img/logo/logo.png" alt="logo">
                </a>
                <p class="p-t-35">Sign into your pages account</p>
                <!-- START Login Form -->
                <form id="form-login" class="p-t-15" role="form" action="">
                    <!-- START Form Control-->
                    <div class="form-group form-group-default">
                        <label>Username</label>
                        <div class="controls">
                            <input type="text" name="username" class="form-control" required>
                        </div>
                    </div>
                    <!-- END Form Control-->
                    <!-- START Form Control-->
                    <div class="form-group form-group-default">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <!-- START Form Control-->
                    <div class="row">
                        <div class="grid-6">
                            <div class="checkbox ">
                                <input type="checkbox" value="1" id="checkbox1">
                                <label for="checkbox1">Keep Me Signed in</label>
                            </div>
                        </div>
                        <div class="grid-6 p-t-10 text-right">
                            <a href="#" class="small">Forgotten your password?</a>
                        </div>
                    </div>
                    <!-- END Form Control-->
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-complete m-t-10 btn-block" type="submit">Login</button>
                        </div>
                        <div class="col-md-6">
                            <a href="enroll.php" class="btn btn-success m-t-10 btn-block">Join Live PURE</a>
                        </div>
                    </div>
                </form>
            </div>
            <!--END Login Form-->
            <div class="login-bottom">
                <div class="clearfix">
                    <div class="col-sm-12 login-info">
                        <p>
                            Contact us at <a href="tell:866-535-5888">(866) 535-5888</a> or <a href="mailto:info@livepure.com">info@livepure.com</a>
                        </p>
                        <p>
                            For all media inquiries, contact <a href="mailto:media@livepure.com">media@livepure.com</a>
                        </p>
                        <small>
                            7164 Technology Drive, Suite 100 Frisco, TX 75033
                        </small>
                    </div>
                </div>
                <div class="login-copyright">
                    &copy; 2018 PURE, Inc. All rights reserved.
                    <div class="btn-group pull-right">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dropdown locale">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-globe"></i>&nbsp;
                English
                <i class="fa fa-angle-down hint-text"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="#" class="dropdown-item">English</a>
                <a href="#" class="dropdown-item">Korean</a>
            </div>
        </div>
    </div>
    <!-- END Login Right Container-->
</div>
<!-- START OVERLAY -->

<!-- END OVERLAY -->
<?php include './common/script.php' ?>
<script src="/vendors/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/pages/js/pages.js"></script>
<script>
    function initForm() {
        $('#form-login').validate()
    }

    function initVideo() {
        if ($(window).width() > 770) {
            $("#heroVid").show();
        } else {
            $("#heroVid").hide();
        }
    }

    $(function () {
        initVideo();
        initForm();
    });

    $(window).resize(function () {
        initVideo();
    });
</script>
</body>
</html>