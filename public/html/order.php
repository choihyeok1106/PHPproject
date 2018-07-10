<?php include './common/head.php' ?>

<body class="horizontal-menu horizontal-app-menu orders">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">

                <h3 class="page-title">Order Details</h3>

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

                <div class="shopping m-t-15">
                    <div class="card card-borderless">
                        <div class="card-header">
                            <div class="card-title p-t-10">Order# 6178353</div>

                            <div class="card-controls">
                                <div class="btn-toolbar flex-wrap" role="toolbar">
                                    <div class="btn-group">
                                        <a href="invoice.php" class="btn btn-default"><i class="fa fa-print"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Cancel Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4  m-b-15">
                                    <h6 class="hint-text semi-bold">ORDER INFORMATION</h6>
                                    Order Date: 6/29/2018 <br>
                                    Status: Shipped <br>
                                    Shipping: Standard + M <br>
                                    Tracking #: <a href="#">467054710687083</a> <br>
                                    Payment Method: <i class="fa fa-cc-visa"></i> **** 5555 <br>
                                </div>
                                <div class="col-lg-4 m-b-15">
                                    <h6 class="hint-text semi-bold">SHIPPING ADDRESS</h6>
                                    Brandy Costello <br>
                                    3203 Deer Path Lane <br>
                                    Weatherford, TX 76085 <br>
                                    (555) 123–5678 <br>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="hint-text semi-bold">ORDER SUMMARY</h6>
                                    <div class="d-flex">
                                        <div class="text-left w-50">
                                            SubTotal
                                        </div>
                                        <div class="text-right w-50">
                                            $200.70
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="text-left w-50">
                                            Shipping
                                        </div>
                                        <div class="text-right w-50">
                                            $10.01
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="text-left w-50">
                                            Handling Fee
                                        </div>
                                        <div class="text-right w-50">
                                            $2.00
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="text-left w-50">
                                            Tax
                                        </div>
                                        <div class="text-right w-50">
                                            $0.00
                                        </div>
                                    </div>
                                    <div class="border-top m-t-5 m-b-5"></div>
                                    <div class="d-flex">
                                        <div class="text-left w-50 semi-bold">
                                            Grand Total
                                        </div>
                                        <div class="text-right w-50 semi-bold">
                                            $212.71
                                        </div>
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

