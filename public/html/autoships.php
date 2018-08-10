<?php include './common/head.php' ?>
<link href="<?= STATIC_SERVER ?>/vendors/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<?php include './common/header.php' ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include './common/sidebar.php' ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h1 class="page-title">Autoship Profile
                <small></small>
            </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="/html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Autoship Profile</span>
                    </li>
                </ul>
            </div>

            <div class="btn-toolbar margin-bottom-15" role="toolbar">
                <div class="btn-group btn-group-sm pull-right">
                    <button type="button" class="btn blue">Add New Profile</button>
                </div>
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-default active">1 Week</button>
                    <button type="button" class="btn btn-default">2 Week</button>
                    <button type="button" class="btn btn-default">1 Month</button>
                    <button type="button" class="btn btn-default">3 Month</button>
                    <button type="button" class="btn btn-default">6 Month</button>
                    <button type="button" class="btn btn-default">1 year</button>
                </div>
            </div>

            <!-- END PAGE HEADER-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Orders</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table data-toggle="table">
                        <thead>
                        <tr>
                            <th data-field="id">ORDER #</th>
                            <th data-field="name">Total</th>
                            <th data-field="price">PV</th>
                            <th data-field="date">Date</th>
                            <th data-field="status">Status</th>
                            <th class="text-right" data-field="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <tr>
                                <td>6490663</td>
                                <td>$74.85</td>
                                <td>30</td>
                                <td>April 26, 2018</td>
                                <td>SHIPPED</td>
                                <td class="text-right">
                                    <a href="order.php">Order Details</a>
                                    <span>|</span>
                                    <a href="#">Tracking</a>
                                    <span>|</span>
                                    <a href="invoice.php">Invoice</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="order-list shopping hide">
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <div class="portlet light">
                        <div class="portlet-title margin-0 border-0">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="name">ORDER # 6490663</div>
                                    <div class="value sbold">SHIPPED</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="name">TOTAL</div>
                                    <div class="value sbold">$74.85</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="name">Order PV</div>
                                    <div class="value sbold">30</div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="name">April 26, 2018</div>
                                    <div class="value">
                                        <a href="order.php">Order Details</a>
                                        <span>|</span>
                                        <a href="#">Tracking</a>
                                        <span>|</span>
                                        <a href="invoice.php">Invoice</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body padding-0">
                            <table class="table margin-0">
                                <tbody>
                                <?php for ($n = 0; $n < 3; $n++) { ?>
                                    <tr>
                                        <td>
                                            <a href="product.php" class="thumbnail">
                                                <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="product.php">Webarch UI Framework Dashboard UI Pack</a>
                                        </td>
                                        <td class="text-right price">Qty 1</td>
                                        <td class="text-right price">$24.95</td>
                                        <td class="text-right volume">10 PV</td>
                                        <td class="text-right action">
                                            SHIPPED
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <div class="row hide">
                                <div class="col-md-5"></div>
                                <div class="col-md-2">
                                    <a href="#" class="btn default btn-xs btn-block">All Products...</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-borderless hide">
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
                            <table class="table table-hover">
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

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <?php include './common/quick-sidebar.php' ?>
</div>
<!-- END CONTAINER -->
<?php include './common/footer.php' ?>
<?php include './common/script.php' ?>
<script src="<?= STATIC_SERVER ?>/vendors/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
</body>
</html>
