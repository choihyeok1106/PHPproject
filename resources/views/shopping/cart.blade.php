@extends('layouts.app')

@section('style.plugins')
    <link href="{{css('/css/pages/shopping.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/home">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Shopping Cart</span>
            </li>
        </ul>

    </div>

    <div class="row cart">
        <!--Products-->
        <div class="col-lg-8">
            <div class="portlet light">
                <div class="portlet-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th width="50" class="text-center thumb">Image</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-6">Product</div>
                                    <div class="col-md-2 text-right mobile-hide">Price</div>
                                    <div class="col-md-2 text-right mobile-hide">PV</div>
                                    <div class="col-md-2 text-right mobile-hide">Quantity</div>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="cart-items">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                        <tr class="product-row">
                            <td class="text-center">
                                <a href="product.php" class="thumbnail">
                                    <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                                </a>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6 list-name">
                                        <a href="product.php">Webarch UI Framework Dashboard UI Pack</a>
                                    </div>
                                    <div class="col-md-2 list-price">
                                        <p class="price text-danger">$24.95</p>
                                    </div>
                                    <div class="col-md-2 list-val">
                                        <p class="pv">10 PV</p>
                                    </div>
                                    <div class="col-md-2 list-qty">
                                        <select class="qty">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 list-action">
                                        <a href="javascript:;" class="del">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="promotions">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control default">
                                    <option>Rally28 $5 Ground Shipping</option>
                                    <option>Rally28 Free Handling</option>
                                    <option>Rally 28 $1 Enrollment</option>
                                </select>
                            </div>
                        </div>

                        <div class="well"> Tight pants next level keffiyeh trigger me on click haven't heard of them.
                            Photo booth beard raw
                            denim letterpress vegan messenger bag stumptown.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total -->
        <div class="col-lg-4 totals">
            <div class="portlet light fixed-aside" data-top="88" data-offset="15" data-class="page-fixed-aside">
                <div class="portlet-body">
                    <div class="m-grid">
                        <div class="m-grid-row total-top">
                            <div class="m-grid-col m-grid-col-md-6">PV total</div>
                            <div id="pv-total" class="m-grid-col m-grid-col-md-6">0</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6 padding-top-15">Subtotal</div>
                            <div id="sub-total" class="m-grid-col m-grid-col-md-6 padding-top-15">$0</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6">Tax</div>
                            <div id="tax-total" class="m-grid-col m-grid-col-md-6">$0</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6">Handling fee</div>
                            <div id="handling-total" class="m-grid-col m-grid-col-md-6">$0</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6">Shipping fee</div>
                            <div id="shipping-total" class="m-grid-col m-grid-col-md-6">$0</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6">Discount</div>
                            <div id="discount-total" class="m-grid-col m-grid-col-md-6">$0</div>
                        </div>
                        <div class="m-grid-row total-bot">
                            <div class="m-grid-col m-grid-col-md-6">Order total</div>
                            <div id="order-total" class="m-grid-col m-grid-col-md-6 font-purple">$0</div>
                        </div>
                    </div>

                    <div class="total-act">
                        <a href="{{route('shopping.checkout')}}" class="btn green-meadow btn-lg btn-block">
                            <i class="icon-credit-card"></i> &nbsp; Proceed to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.plugins')
    <script src="{{js('/js/pages/cart.js')}}" type="text/javascript"></script>
@endsection