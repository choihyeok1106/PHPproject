<?php include './common/head.php' ?>
<!-- PAGE::STYLE -->
<body class="horizontal-menu horizontal-app-menu shopping">
<?php include './common/header.php' ?>
<div class="page-container">
    <div class="page-content-wrapper ">
        <div class="content">
            <!-- START PAGE CONTENT -->
            <div class="md-container">
                <h3 class="page-title">Order Checkout</h3>

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
                                <div class="padding-30 sm-padding-5">
                                    <ul class="list-unstyled list-inline m-l-30">
                                        <li><a href="#" class="p-r-30 text-black">Credit card</a></li>
                                        <li><a href="#" class="p-r-30 text-black  hint-text">PayPal</a></li>
                                        <li><a href="#" class="p-r-30 text-black  hint-text">Wire transfer</a></li>
                                    </ul>
                                    <form role="form">
                                        <div class="bg-master-light padding-30 b-rad-lg">
                                            <h2 class="pull-left no-margin">Credit Card</h2>
                                            <ul class="list-unstyled pull-right list-inline no-margin">
                                                <li>
                                                    <a href="#">
                                                        <img width="51" height="32" data-src-retina="/img/form-wizard/visa2x.png" data-src="/img/form-wizard/visa.png" class="brand" alt="logo" src="/img/form-wizard/visa.png">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hint-text">
                                                        <img width="51" height="32" data-src-retina="/img/form-wizard/amex2x.png" data-src="/img/form-wizard/amex.png" class="brand" alt="logo" src="/img/form-wizard/amex.png">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="hint-text">
                                                        <img width="51" height="32" data-src-retina="/img/form-wizard/mastercard2x.png" data-src="/img/form-wizard/mastercard.png" class="brand" alt="logo" src="/img/form-wizard/mastercard.png">
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="form-group form-group-default required m-t-25">
                                                <label>Card holder's name</label>
                                                <input type="text" class="form-control" placeholder="Name on the card" required>
                                            </div>
                                            <div class="form-group form-group-default required">
                                                <label>Card number</label>
                                                <input type="text" class="form-control" placeholder="8888-8888-8888-8888" required>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-8 lg-m-b-15">
                                                    <label>Expiration</label>
                                                    <br>
                                                    <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                                        <option>Jan (01)</option>
                                                        <option>Feb (02)</option>
                                                        <option>Mar (03)</option>
                                                        <option>Apr (04)</option>
                                                        <option>May (05)</option>
                                                        <option>Jun (06)</option>
                                                        <option>Jul (07)</option>
                                                        <option>Aug (08)</option>
                                                        <option>Sep (09)</option>
                                                        <option>Oct (10)</option>
                                                        <option>Nov (11)</option>
                                                        <option>Dec (12)</option>
                                                    </select>
                                                    <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020" selected>2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 lg-right">
                                                    <label>CVC Code</label>
                                                    <br>
                                                    <input type="text" class="form-control" style="width: 100px" placeholder="000" required>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="clearfix m-t-30">
                                        <ul class="pager no-style">
                                            <li class="next">
                                                <a href="order-complete.php" class="btn btn-success btn-cons btn-animated from-left pull-right fa fa-check">
                                                    <span>Place Order</span>
                                                </a>
                                            </li>
                                            <li class="previous">
                                                <button class="btn btn-default btn-cons pull-right btn-animated from-left fa fa-close" type="button">
                                                    <span>Cancel</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
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

