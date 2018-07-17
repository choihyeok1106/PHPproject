<?php include './common/head.php' ?>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<?php include './common/header.php' ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include './common/sidebar.php' ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="/html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Order Complete</span>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold uppercase"> Thank you</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <p>
                                Congratulations !
                            </p>
                            <div class="text-right">
                                <button class="btn btn-default btn-cons" type="button">
                                    <i class="fa fa-shopping-cart"></i> &nbsp; Continue Shopping
                                </button>

                                <button class="btn btn-success btn-cons" type="button">
                                    <i class="fa fa-check"></i> &nbsp; Finish
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <?php include './common/quick-sidebar.php' ?>
</div>
<!-- END CONTAINER -->
<?php include './common/footer.php' ?>
<?php include './common/script.php' ?>
</body>
</html>