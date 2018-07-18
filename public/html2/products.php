<?php include './common/head.php' ?>
<body class="horizontal-menu horizontal-app-menu">
<?php include './common/header.php' ?>
<?php include './common/shop-header.php' ?>

<div class="page-container ">
    <div class="page-content-wrapper ">
        <div class="content ">
            <!-- START PAGE CONTENT -->
            <div class="md-container p-t-0">
                <div class="pull-right m-t-15">
                    <select>
                        <option>New Item</option>
                        <option>Item Name: A-Z</option>
                        <option>Item Name: Z-A</option>
                        <option>PV: High to low</option>
                        <option>PV: Low to high</option>
                        <option>Price: High to low</option>
                        <option>Price: Low to high</option>
                    </select>
                </div>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="products.php">Shop</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>


                <div class="row">
                    <?php for ($i = 0; $i < 24; $i++) { ?>
                        <div class="col-md-4 col-lg-3 col-sm-6">
                            <div class="card social-card share share-other card-borderless card-product" data-social="item">
                                <div class="card-content full-height">
                                    <a href="product.php">
                                        <img alt="Person photo"
                                             src="https://shop.livepure.co.kr/upfiles/product/main_4008_gs557k1_2.jpg">
                                    </a>
                                </div>
                                <a href="product.php" class="card-header clearfix last">
                                    <h5>PURE BlenderBottle® Classic™ Bottle</h5>
                                </a>
                                <div class="card-price">
                                    <div class="row">
                                        <div class="price">
                                            RETAIL PRICE
                                        </div>
                                        <div class="volume">
                                            $114.95
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="price">
                                            VOLUME
                                        </div>
                                        <div class="volume">
                                            230
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button class="btn btn-success btn-block" type="button">
                                        <i class="fa fa-shopping-cart"></i> <span class="bold"> &nbsp; Add to Cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
<script src="/html2/pages/js/pages.js?<?= v() ?>"></script>
<!-- END CORE TEMPLATE JS -->

</body>
</html>

