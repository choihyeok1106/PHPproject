<?php include './common/head.php' ?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid shopping">
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
                        <span>Checkout</span>
                    </li>
                </ul>

            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="caption-subject bold uppercase"> Your Cart</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table">
                                <thead>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>PV</th>
                                </thead>
                                <tbody>
                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <tr>
                                        <td>Webarch UI Framework Dashboard UI Pack</td>
                                        <td>1</td>
                                        <td>$24.95</td>
                                        <td>10</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                <th>Bulk Pack Promotion</th>
                                <th class="text-right">
                                    <span class="weight-400">Your selectable PVs: </span>
                                    <span class="text-danger">300</span>
                                </th>
                                </thead>
                                <tbody>
                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <tr>
                                        <td>Webarch UI Framework (75PV)</td>
                                        <td class="text-right">
                                            <div class="qty padding-0 margin-0">
                                                <a href="javascript:;" class="minus">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                                <input type="text" id="qty" value="1" readonly>
                                                <a href="javascript:;" class="plus">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                <th>Promotions</th>
                                <th class="text-right"></th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Rally 28 $1 Enrollment</td>
                                    <td class="text-right">$1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Products-->
                <div class="col-lg-4">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-truck"></i>
                                <span class="caption-subject bold uppercase"> Shipping Method</span>
                            </div>
                            <div class="actions">
                                <a href="javascript:;" class="btn btn-circle btn-default">
                                    <i class="fa fa-pencil"></i> Change
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            GROUND
                        </div>
                    </div>

                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-credit-card "></i>
                                <span class="caption-subject bold uppercase"> Payment</span>
                            </div>
                            <div class="actions">
                                <a href="javascript:;" class="btn btn-circle btn-default">
                                    <i class="fa fa-pencil"></i> Change
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-8 name">
                                    <i class="fa fa-cc-mastercard font-16"></i> MasterCard ending in 6666
                                </div>
                                <div class="col-md-4 value text-right">
                                    $20
                                </div>
                            </div>
                            <div class="row-divider"></div>
                            <div class="row static-info">
                                <div class="col-md-8 name">
                                    <i class="fa fa-cc-visa font-16"></i> Visa ending in 8888
                                </div>
                                <div class="col-md-4 value text-right">
                                    $7.95
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-map-pin"></i>
                                <span class="caption-subject bold uppercase"> Shipping Address</span>
                            </div>
                            <div class="actions">
                                <a href="javascript:;" class="btn btn-circle btn-default">
                                    <i class="fa fa-pencil"></i> Change
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body static-info">
                            <div class="form-group value">
                                Jhon Done<br>
                                15627 S. Broadway st.<br>
                                #KB45889<br>
                                Gardena, CA 90248-2210
                            </div>

                            <div class="form-group form-md-radios">
                                <label>Trading statement</label>
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio1" name="statement" class="md-radiobtn" checked>
                                        <label for="radio1">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Include
                                        </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio2" name="statement" class="md-radiobtn">
                                        <label for="radio2">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Not included
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" id="form_control_1"
                                       placeholder="Please specify your request when you are absent (30 characters or less).">
                                <label for="form_control_1">Shipping Notice</label>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-file-text-o"></i>
                                <span class="caption-subject bold uppercase"> Billing Address</span>
                            </div>
                            <div class="actions">
                                <a href="javascript:;" class="btn btn-circle btn-default">
                                    <i class="fa fa-pencil"></i> Change
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body static-info">
                            <div class="form-group value">
                                Jhon Done<br>
                                15627 S. Broadway st.<br>
                                #KB45889<br>
                                Gardena, CA 90248-2210
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Total -->
                <div class="col-lg-3 totals">
                    <div class="portlet light fixed-aside" data-top="88" data-offset="15" data-class="page-fixed-aside">
                        <div class="portlet-body">
                            <div class="m-grid">
                                <div class="m-grid-row total-top">
                                    <div class="m-grid-col m-grid-col-md-6">Total PV</div>
                                    <div class="m-grid-col m-grid-col-md-6">40</div>
                                </div>
                                <div class="m-grid-row">
                                    <div class="m-grid-col m-grid-col-md-6 padding-top-15">Subtotal</div>
                                    <div class="m-grid-col m-grid-col-md-6 padding-top-15">$24.95</div>
                                </div>
                                <div class="m-grid-row">
                                    <div class="m-grid-col m-grid-col-md-6">Tax Total</div>
                                    <div class="m-grid-col m-grid-col-md-6">$2.5</div>
                                </div>
                                <div class="m-grid-row">
                                    <div class="m-grid-col m-grid-col-md-6">Handling Fee</div>
                                    <div class="m-grid-col m-grid-col-md-6">$0</div>
                                </div>
                                <div class="m-grid-row">
                                    <div class="m-grid-col m-grid-col-md-6">Shipping Total</div>
                                    <div class="m-grid-col m-grid-col-md-6">$5.4</div>
                                </div>
                                <div class="m-grid-row">
                                    <div class="m-grid-col m-grid-col-md-6">Discount</div>
                                    <div class="m-grid-col m-grid-col-md-6">$1</div>
                                </div>
                                <div class="m-grid-row total-bot">
                                    <div class="m-grid-col m-grid-col-md-6">Total</div>
                                    <div class="m-grid-col m-grid-col-md-6 font-purple">$27.95</div>
                                </div>
                            </div>

                            <div class="total-act">
                                <a href="order-complete.php" class="btn green-meadow btn-lg btn-block">
                                    <i class="icon-basket-loaded"></i> &nbsp; Place your order
                                </a>
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
