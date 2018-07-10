<?php include './common/head.php' ?>
<!-- PAGE::STYLE -->
<body class="horizontal-menu horizontal-app-menu shopping">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper ">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">
                <h3 class="page-title">Shopping Cart</h3>

                <div class="card card-borderless">
                    <div class="card-header  hide">
                        <div class="card-title">
                            <h5>Portlet Title</h5>
                        </div>
                    </div>
                    <div class="card-body padding-25">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="50" class="text-center thumb">Image</th>
                                <th>Product</th>
                                <th width="100" class="text-right price">Price</th>
                                <th width="75" class="text-right volume">PV</th>
                                <th width="50" class="text-right action">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < 4; $i++) { ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="product.php">
                                            <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="product.php">Webarch UI Framework Dashboard UI Pack</a>

                                        <div class="qty">
                                            <a href="javascript:;" class="minus">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                            <input type="text" id="qty" value="1" readonly>
                                            <a href="javascript:;" class="plus">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-right">$24.95</td>
                                    <td class="text-right">10</td>
                                    <td class="text-right">
                                        <a href="#" class="remove-item"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <td colspan="2" class="text-right">SubTotal:</td>
                            <td class="text-right">$24.95</td>
                            <td class="text-right">10 PV</td>
                            <td></td>
                            </tfoot>
                        </table>
                        <div class="promotions">
                            <div class="form-group">
                                Promotions: &nbsp;
                                <select>
                                    <option>Rally28 $5 Ground Shipping</option>
                                    <option>Rally28 Free Handling</option>
                                    <option>Rally 28 $1 Enrollment</option>
                                </select>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <p class="small hint-text">
                                        Because you are purchasing the Rally28 items, we are only charging you $5 for shipping.
                                    </p>
                                    <a href="#" class="hide">View all</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row b-a b-grey no-margin totals">
                            <div class="col-md-3 p-l-10 sm-padding-15 align-items-center d-flex">
                                <div class="total-item">
                                    <h5 class="font-montserrat all-caps small no-margin hint-text bold">Subtotal</h5>
                                    <p class="no-margin">$24.95</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-middle sm-padding-15 align-items-center d-flex">
                                <div class="total-item">
                                    <h5 class="font-montserrat all-caps small no-margin hint-text bold">Tax</h5>
                                    <p class="no-margin">$2.5</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-middle sm-padding-15 align-items-center d-flex">
                                <div class="total-item">
                                    <h5 class="font-montserrat all-caps small no-margin hint-text bold">Discount</h5>
                                    <p class="no-margin">$1</p>
                                </div>
                            </div>
                            <div class="col-md-3 text-right bg-grey padding-10">
                                <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">Total</h5>
                                <h4 class="no-margin text-white">$26.45</h4>
                            </div>
                        </div>

                        <div class="clearfix m-t-30">
                            <ul class="pager no-style">
                                <li class="next">
                                    <a href="order-review.php" class="btn btn-success btn-cons btn-animated from-left fa pull-right fa-credit-card" >
                                        <span>Checkout</span>
                                    </a>
                                </li>
                                <li class="previous">
                                    <button class="btn btn-default btn-cons pull-right fa-trash-o btn-animated from-left fa" type="button">
                                        <span>Clear Cart</span>
                                    </button>
                                </li>
                            </ul>
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

<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/pages/js/pages.js?<?= v() ?>"></script>
</body>
</html>

