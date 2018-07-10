<?php include './common/head.php' ?>

<body class="horizontal-menu horizontal-app-menu orders">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">

                <h3 class="page-title">Order History</h3>

                <div class="btn-toolbar m-t-10" role="toolbar">
                    <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-default active">1 Week</button>
                        <button type="button" class="btn btn-default">2 Week</button>
                        <button type="button" class="btn btn-default">1 Month</button>
                        <button type="button" class="btn btn-default">3 Month</button>
                        <button type="button" class="btn btn-default">6 Month</button>
                        <button type="button" class="btn btn-default">1 year</button>
                    </div>
                </div>

                <ul class="nav hide nav-tabs nav-tabs-simple nav-tabs-borderless  d-none d-md-flex d-lg-flex d-xl-flex" role="tablist"
                    data-init-reponsive-tabs="dropdownfx">
                    <li class="nav-item">
                        <a class="active" href="#">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#">Autoship Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a href="#">Your List</a>
                    </li>
                </ul>

                <div class="order-list shopping">
                    <?php for ($i = 0; $i < 5; $i++) { ?>
                        <div class="card card-borderless">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="desc">ORDER # 6490663</div>
                                        <div class="val">SHIPPED</div>
                                    </div>
                                    <div class="col-2">
                                        <div class="desc">TOTAL</div>
                                        <div class="val">$74.85</div>
                                    </div>
                                    <div class="col-2">
                                        <div class="desc">Order PV</div>
                                        <div class="val">30</div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="desc">April 26, 2018</div>
                                        <div class="val">
                                            <a href="order.php">Order Details</a>
                                            <span>|</span>
                                            <a href="invoice.php">Invoice</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                    <?php for ($n = 0; $n < 3; $n++) { ?>
                                        <tr>
                                            <td class="thumb">
                                                <a href="product.php">
                                                    <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="product.php">Webarch UI Framework Dashboard UI Pack</a>

                                                <div class="qty">
                                                    Qty : 1
                                                </div>
                                            </td>
                                            <td class="text-right price">$24.95</td>
                                            <td class="text-right volume">10 PV</td>
                                            <td class="text-right action">
                                                SHIPPED
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="dataTables_wrapper paginate">
                    <div class="dataTables_paginate paging_simple_numbers">
                        <ul class="">
                            <li class="paginate_button previous disabled"><a href="#"><i class="pg-arrow_left"></i></a></li>
                            <li class="paginate_button active"><a href="#">1</a></li>
                            <li class="paginate_button "><a href="#" >2</a></li>
                            <li class="paginate_button "><a href="#" >3</a></li>
                            <li class="paginate_button next"><a href="#" ><i class="pg-arrow_right"></i></a></li>
                        </ul>
                    </div>
                    <div class="dataTables_info">Showing <b>1 to 5</b> of 12 entries</div>
                </div>

            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <?php include './common/footer.php' ?>
    </div>
</div>
<?php include './common/quickview.php' ?>
<?php include './common/script.php' ?>
<!-- PAGE SCRIPT -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/pages/js/pages.js?<?= v() ?>"></script>


</body>
</html>

