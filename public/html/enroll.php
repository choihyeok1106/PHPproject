<?php include './common/head.php' ?>
<script type="text/javascript">
    window.onload = function () {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/pages/css/windows.chrome.fix.css" />'
    }
</script>
<body class="fixed-header enroll">

<div class="register-container full-height">
    <div class="d-flex justify-content-center flex-column ">
       <div class="text-center">
           <a href="/html" class="logo">
               <img src="/img/logo/logo.png" alt="logo" width="200">
           </a>
       </div>

        <div data-pages="card" class="card card-default card-borderless" id="card-basic">
            <div class="card-header  ">
                <div class="card-title">NEW ENROLLMENT</div>
            </div>
            <div class="card-body">
                <form id="form-register" class="p-t-15" role="form" action="">
                    <h6>SELECT YOUR COUNTRY</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <select class="full-width select2" data-init-plugin="select2">
                                    <option value="US" selected>USA</option>
                                    <option value="AU">AUSTRALIA</option>
                                    <option value="CA">CANADA</option>
                                    <option value="JP">JAPAN</option>
                                    <option value="KR">KOREA, REPUBLIC OF</option>
                                    <option value="NZ">NEW ZEALAND</option>
                                    <option value="TW">TAIWAN, PROVINCE OF CHINA</option>
                                    <option value="TH">THAILAND</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row hide">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Sponsor</label>
                                <input type="text" value="US11259632" class="form-control" required readonly>
                            </div>
                        </div>
                    </div>

                    <h6 class="m-t-25">FIND YOUR SPONSOR</h6>
                    <p>Please locate the Independent Business Owner who referred you. </p>

                    <div class="form-group">
                        <!--                <label>SEARCH BY: </label>-->
                        <div class="radio radio-success no-margin">
                            <input type="radio" value="PHONE" name="search_field" id="PHONE">
                            <label for="PHONE">PHONE</label>
                            <input type="radio" value="EMAIL" name="search_field" id="EMAIL">
                            <label for="EMAIL">EMAIL</label>
                            <input type="radio" value="URL" name="search_field" id="URL">
                            <label for="URL">WEBSITE URL</label>
                            <input type="radio" value="REP" name="search_field" id="REP" checked>
                            <label for="REP">REP NUMBER</label>
                        </div>
                        <div class="input-group m-t-5">
                            <input type="text" class="form-control" placeholder="Rep Number">
                            <div class="input-group-append">
                                <span class="input-group-text success"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-transparent m-b-10">
                                <div class="card-body no-padding">
                                    <div id="card-advance" class="card card-default">
                                        <div class="card-body">
                                            <h4 class="no-margin"><span class="semi-bold">Sponsor</span> Detail</h4>
                                            <div class="m-t-10">
                                                <div class="profile-img-wrapper m-t-5 inline">
                                                    <img src="/img/profiles/bd2x.jpg" width="35" height="35" alt="">
                                                </div>
                                                <div class="inline m-l-20">
                                                    <p>
                                                        Adriana Lima (US10896068)
                                                        <br>
                                                        <i class="fa fa-phone"></i> &nbsp;(425) 555-1212
                                                    </p>
                                                </div>
                                            </div>

                                            <a href="enroll-type.php" class="btn btn-success btn-cons m-t-10 pull-right">
                                                Yes, this is my rep
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6>CONTINUE WITHOUT A REP</h6>
                    <p>
                        If you were not referred by a PURE Independent Business Owner, you may continue with registration and will be contacted by our
                        customer service department so we can properly place you in the organization and assign sponsorship. Once placed under an
                        exisiting IBO, your contact information will be available to the upline sponsors who may contact you in regards to PURE.
                    </p>
                    <p>
                        Your information will not be shared outside the PURE organization.
                    </p>
                    <a href="enroll-type.php" class="btn btn-success btn-cons m-t-10 pull-right btn-line">
                        Continue Without a Rep
                    </a>
                </form>
            </div>
        </div>

    </div>

    <div class="footer">
        <select class="locale">
            <option>English</option>
            <option>Korean</option>
        </select>

        <div class="copyright">
            <span class="hint-text">Copyright &copy; 2018 </span>
            <span class="font-montserrat"> PURE, Inc. </span>
            <span class="hint-text">All rights reserved. </span>
        </div>
    </div>
</div>


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