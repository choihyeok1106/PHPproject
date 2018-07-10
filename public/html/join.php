<?php include './common/head.php' ?>
<script type="text/javascript">
    window.onload = function () {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/pages/css/windows.chrome.fix.css" />'
    }
</script>
<body class="fixed-header enroll">
<div class="md-container">
    <div class="card card-transparent flex-row">
        <ul class="nav nav-tabs nav-tabs-left" id="tab-3">
            <li class="nav-item">
                <a href="#" class="active" data-toggle="tab" data-target="#tab3hellowWorld">One</a>
            </li>
            <li class="nav-item">
                <a href="#" data-toggle="tab" data-target="#tab3FollowUs">Two</a>
            </li>
            <li class="nav-item">
                <a href="#" data-toggle="tab" data-target="#tab3Inspire">Three</a>
            </li>
        </ul>
        <div class="tab-content bg-white">
            <div class="tab-pane" id="tab3hellowWorld">
                <div class="row column-seperation">
                    <div class="col-lg-6">
                        <h3>
                            <span class="semi-bold">Sometimes </span>Small things in life
                            means the most
                        </h3>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="semi-bold">
                            great tabs
                        </h3>
                        <p>Native boostrap tabs customized to Pages look and feel, simply changing class name you can change color as well as its
                            animations</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="tab3FollowUs">
                <h3>
                    “ Nothing is <span class="semi-bold">impossible</span>, the word
                    itself says 'I'm <span class="semi-bold">possible</span>'! ”
                </h3>
                <p>
                    A style represents visual customizations on top of a layout. By editing a style, you can use Squarespace's visual interface to
                    customize your...
                </p>
                <br>
                <p class="pull-right">
                    <button class="btn btn-default btn-cons" type="button">White</button>
                    <button class="btn btn-success btn-cons" type="button">Success</button>
                </p>
            </div>
            <div class="tab-pane" id="tab3Inspire">
                <h3>
                    Follow us &amp; get updated!
                </h3>
                <p>
                    Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.
                </p>
                <br>
            </div>
        </div>
    </div>
</div>
<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <a href="/html">
            <img src="/img/logo/logo.png" alt="logo" width="200">
        </a>
        <h3>Pages makes it easy to enjoy what matters the most in your life</h3>
        <p>
            Create a pages account. If you have a facebook account, log into it for this process. Sign in with <a href="#"
                                                                                                                  class="text-info">Facebook</a> or <a
                    href="#" class="text-info">Google</a>
        </p>
        <form id="form-register" class="p-t-15" role="form" action="index.html">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="John" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Last Names</label>
                        <input type="text" name="lname" placeholder="Smith" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Pages User name</label>
                        <input type="text" name="uname" placeholder="yourname.pages.com (this can be changed later)" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Minimum of 4 Charactors" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="We will send loging details to you" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-lg-6">
                    <p>
                        <small>I agree to the <a href="#" class="text-info">Pages Terms</a> and <a href="#" class="text-info">Privacy</a>.</small>
                    </p>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="#" class="text-info small">Help? Contact Support</a>
                </div>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
        </form>
    </div>
</div>
<div class=" full-width">
    <div class="register-container m-b-10 clearfix">
        <div class="m-b-30 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix d-flex-md-up">
            <div class="col-md-2 no-padding d-flex align-items-center">
                <img src="/img/demo/pages_icon.png" alt="" class="" data-src="/img/demo/pages_icon.png" data-src-retina="/img/demo/pages_icon_2x.png"
                     width="60" height="60">
            </div>
            <div class="col-md-9 no-padding d-flex align-items-center">
                <p class="hinted-text small inline sm-p-t-10">No part of this website or any of its contents may be reproduced, copied, modified or
                    adapted, without the prior written consent of the author, unless otherwise indicated for stand-alone materials.</p>
            </div>
        </div>
    </div>
</div>
<!-- START OVERLAY -->
<div class="overlay hide" data-pages="search">
    <!-- BEGIN Overlay Content !-->
    <div class="overlay-content has-results m-t-20">
        <!-- BEGIN Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Logo !-->
            <img class="overlay-brand" src="/img/logo.png" alt="logo" data-src="/img/logo.png" data-src-retina="/img/logo_2x.png" width="78"
                 height="22">
            <!-- END Overlay Logo !-->
            <!-- BEGIN Overlay Close !-->
            <a href="#" class="close-icon-light overlay-close text-black fs-16">
                <i class="pg-close"></i>
            </a>
            <!-- END Overlay Close !-->
        </div>
        <!-- END Overlay Header !-->
        <div class="container-fluid">
            <!-- BEGIN Overlay Controls !-->
            <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
            <br>
            <div class="inline-block">
                <div class="checkbox right">
                    <input id="checkboxn" type="checkbox" value="1" checked="checked">
                    <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                </div>
            </div>
            <div class="inline-block m-l-10">
                <p class="fs-13">Press enter to search</p>
            </div>
            <!-- END Overlay Controls !-->
        </div>
        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
        <div class="container-fluid">
          <span>
                <strong>suggestions :</strong>
            </span>
            <span id="overlay-suggestions"></span>
            <br>
            <div class="search-results m-t-40">
                <p class="bold">Pages Search Results</p>
                <div class="row">
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>
                                    <img width="50" height="50" src="/img/profiles/avatar.jpg" data-src="/img/profiles/avatar.jpg"
                                         data-src-retina="/img/profiles/avatar2x.jpg" alt="">
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                                <p class="hint-text">via john smith</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div>T</div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
                                <p class="hint-text">via pages</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                <div><i class="fa fa-headphones large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                                <p class="hint-text">via pagesmix</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                    <div class="col-md-6">
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                                <div><i class="fa fa-facebook large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                                <p class="hint-text">via facebook</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                                <div><i class="fa fa-twitter large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                                <p class="hint-text">via twitter</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                        <!-- BEGIN Search Result Item !-->
                        <div class="">
                            <!-- BEGIN Search Result Item Thumbnail !-->
                            <div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                                <div><i class="fa fa-google-plus large-text "></i>
                                </div>
                            </div>
                            <!-- END Search Result Item Thumbnail !-->
                            <div class="p-l-10 inline p-t-5">
                                <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                                <p class="hint-text">via google plus</p>
                            </div>
                        </div>
                        <!-- END Search Result Item !-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Overlay Search Results !-->
    </div>
    <!-- END Overlay Content !-->
</div>
<!-- END OVERLAY -->
<?php include './common/script.php' ?>
<script src="/vendors/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END VENDOR JS -->
<script src="/pages/js/pages.js"></script>
<script>
    $(function () {
        $('#form-register').validate()
    })
</script>
</body>
</html>