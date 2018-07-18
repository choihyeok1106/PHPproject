<?php include './common/head.php' ?>
<!-- PAGE::STYLE -->
<body class="horizontal-menu horizontal-app-menu shopping">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper ">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">
                <h3 class="page-title">Review Order</h3>

                <div class="card card-borderless checkout">
                    <div class="card-body padding-25">
                        <div class="row row-same-height">
                            <div class="col-lg-6 b-r b-dashed b-grey p-r-25">
                                <h5>YOUR CART (USA)</h5>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th class="text-right">Qty</th>
                                        <th class="text-right">PV</th>
                                        <th class="text-right">Price</th>
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
                                            </td>
                                            <td class="text-right">1</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">$24.95</td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-right">SUBTOTAL</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">40 PV</td>
                                        <td class="text-right">$96.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Tax Total</td>
                                        <td colspan="3" class="text-right">$9.60</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Handling Fee</td>
                                        <td colspan="3" class="text-right">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Shipping Total</td>
                                        <td colspan="3" class="text-right">$5.40</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Discount</td>
                                        <td colspan="3" class="text-right">$3.00</td>
                                    </tr>
                                    <tr class="total">
                                        <td colspan="5" class="text-right">
                                            <h4 class="text-primary no-margin font-montserrat">$27</h4>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="padding-15">
                                    <form role="form">
                                        <h5 class="text-uppercase m-t-0">SHIPPING METHOD</h5>
                                        <div class="form-group">
                                            <div class="radio radio-success">
                                                <input type="radio" checked name="shipping" value="1" id="checkbox7">
                                                <label for="checkbox7">Ground</label>
                                            </div>
                                            <div class="radio radio-success">
                                                <input type="radio" name="shipping" value="1" id="checkbox8">
                                                <label for="checkbox8">2nd +</label>
                                            </div>
                                            <div class="radio radio-success">
                                                <input type="radio"  value="1" id="checkbox9" name="shipping">
                                                <label for="checkbox9">2nd + M</label>
                                            </div>
                                        </div>

                                        <br>
                                        <button class="btn btn-success btn-xs pull-right">Change</button>
                                        <h5 class="text-uppercase">Shipping Address</h5>
                                        <div class="form-group-attached">
                                            <div class="form-group form-group-default">
                                                15627 S. Broadway st.<br>
                                                #KB45889<br>
                                                Gardena, CA 90248-2210
                                            </div>
                                        </div>

                                        <br>
                                        <button class="btn btn-success btn-xs pull-right">Change</button>
                                        <h5 class="text-uppercase">Billing Address</h5>
                                        <div class="form-group-attached">
                                            <div class="form-group form-group-default">
                                                Same as shipping address
                                            </div>
                                        </div>

                                        <br>
                                        <h5 class="text-uppercase">Trading statement</h5>
                                        <div class="form-group-attached">
                                            <div class="radio radio-success">
                                                <input type="radio" checked value="yes" name="optionyes" id="yes">
                                                <label for="yes">Include</label>
                                                <input type="radio" value="no" name="optionyes" id="no">
                                                <label for="no">Not included</label>
                                            </div>
                                        </div>

                                        <br>
                                        <h5 class="text-uppercase">Shipping Notice</h5>
                                        <div class="form-group-attached">
                                            <textarea class="form-control" placeholder="Please specify your request when you are absent (30 characters or less)."></textarea>
                                        </div>

                                        <div class="clearfix m-t-30">
                                            <ul class="pager no-style">
                                                <li class="next">
                                                    <a href="order-checkout.php" class="btn btn-success btn-cons btn-animated from-left pull-right fa fa-angle-right">
                                                        <span>Next</span>
                                                    </a>
                                                </li>
                                                <li class="previous">
                                                    <button class="btn btn-default btn-cons pull-right fa-trash-o btn-animated from-left fa fa-angle-left" type="button">
                                                        <span>Back</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
<script src="/html2/pages/js/pages.js?<?= v() ?>"></script>
</body>
</html>

