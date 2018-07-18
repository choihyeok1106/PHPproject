<?php include './common/head.php' ?>
<script type="text/javascript">
    window.onload = function () {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/html2/pages/css/windows.chrome.fix.css" />'
    }
</script>
<body class="fixed-header enroll">

<div class="md-container">
    <div class="text-center">
        <a href="/html2" class="logo">
            <img src="/html2/img/logo/logo.png" alt="logo">
        </a>
    </div>


    <div class="horizontal-nav">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs col-md-3 nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
                <a class="active" data-toggle="tab" href="#tab1" data-target="#tab1" role="tab"><span>Enrollment Type</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#tab2" data-target="#tab2" role="tab"><span>Agreement</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#tab3" data-target="#tab3" role="tab"><span>Personal Information</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#tab4" data-target="#tab4" role="tab"><span>Create First Order</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#tab4" data-target="#tab4" role="tab"><span>Create Autoship Order</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#tab4" data-target="#tab4" role="tab"><span>Checkout</span></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div data-pages="card" class="card card-default card-borderless" id="card-basic">
                <div class="card-header  ">
                    <div class="card-title">NEW ENROLLMENT</div>
                    <div class="card-controls">
                        <div class="dropdown">
                            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-globe"></i>&nbsp;
                                English
                                <i class="fa fa-angle-down hint-text"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown m-t-5" role="menu">
                                <a href="#" class="dropdown-item">English</a>
                                <a href="#" class="dropdown-item">Korean</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height: 480px">

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
    </div>
</div>

<?php include './common/script.php' ?>
<script src="/html2/vendors/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript" src="/html2/vendors/jquery-autonumeric/autoNumeric.js"></script>
<script type="text/javascript" src="/html2/vendors/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="/html2/vendors/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="/html2/vendors/jquery-inputmask/jquery.inputmask.min.js"></script>
<script src="/html2/vendors/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="/html2/vendors/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/html2/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/html2/vendors/summernote/js/summernote.min.js" type="text/javascript"></script>
<script src="/html2/vendors/moment/moment.min.js"></script>
<script src="/html2/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/html2/vendors/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

<script src=/html2"/vendors/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END VENDOR JS -->
<script src="/html2/pages/js/pages.js"></script>
<script src="/html2/js/form_wizard.js" type="text/javascript"></script>
<script>
    $(function () {
        $('#form-register').validate()
    })
</script>
</body>
</html>