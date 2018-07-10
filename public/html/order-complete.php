<?php include './common/head.php' ?>
<!-- PAGE::STYLE -->
<body class="horizontal-menu horizontal-app-menu shopping">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper ">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">
                <h3 class="page-title">Completed</h3>

                <div class="card card-borderless checkout">
                    <div class="card-body padding-25">
                        <h1>Thank you.</h1>

                        <ul class="pager wizard no-style">
                            <li class="next disabled" style="display: none;">
                                <button class="btn btn-primary btn-cons pull-right" type="button">
                                    <span>Next</span>
                                </button>
                            </li>
                            <li class="next finish" style="display: list-item;">
                                <button class="btn btn-success btn-cons pull-right" type="button">
                                    <i class="fa fa-check"></i> <span>Finish</span>
                                </button>
                            </li>
                            <li class="previous">
                                <button class="btn btn-default btn-cons pull-right" type="button">
                                    <i class="fa fa-shopping-cart"></i> <span>Continue Shopping</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <?php include './common/footer.php' ?>
    </div>
</div>
<?php include './common/quickview.php' ?>
<?php include './common/script.php' ?>

<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/pages/js/pages.js?<?= v() ?>"></script>
</body>
</html>

