@extends('layouts.app')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Shopping Cart</span>
            </li>
        </ul>

    </div>

    <div class="row">
        <!--Products-->
        <div class="col-lg-8">
            <div class="portlet light">
                <div class="portlet-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th width="50" class="text-center thumb">Image</th>
                            <th>Product</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                        <tr class="product-row">
                            <td class="text-center">
                                <a href="product.php" class="thumbnail">
                                    <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                                </a>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-8 list-name">
                                        <a href="product.php">Webarch UI Framework Dashboard UI Pack</a>
                                    </div>
                                    <div class="col-md-2 list-price">
                                        $24.95
                                    </div>
                                    <div class="col-md-2 list-val">
                                        10 PV
                                    </div>
                                </div>

                                <div class="qty">
                                    <a href="javascript:;" class="minus">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                    <input type="text" id="qty" value="1" readonly>
                                    <a href="javascript:;" class="plus">
                                        <i class="fa fa-plus"></i>
                                    </a>

                                    <button type="button" class="btn default"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="promotions">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="bs-select form-control default">
                                    <option>Rally28 $5 Ground Shipping</option>
                                    <option>Rally28 Free Handling</option>
                                    <option>Rally 28 $1 Enrollment</option>
                                </select>
                            </div>
                        </div>

                        <div class="well"> Tight pants next level keffiyeh trigger me on click haven't heard of them. Photo booth beard raw
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
                            <div class="m-grid-col m-grid-col-md-6">Total PV</div>
                            <div class="m-grid-col m-grid-col-md-6">40</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6 padding-top-15">Subtotal</div>
                            <div class="m-grid-col m-grid-col-md-6 padding-top-15">$24.95</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6">Tax</div>
                            <div class="m-grid-col m-grid-col-md-6">$2.5</div>
                        </div>
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-md-6">Discount</div>
                            <div class="m-grid-col m-grid-col-md-6">$1</div>
                        </div>
                        <div class="m-grid-row total-bot">
                            <div class="m-grid-col m-grid-col-md-6">Total</div>
                            <div class="m-grid-col m-grid-col-md-6 font-purple">$24.95</div>
                        </div>
                    </div>

                    <div class="total-act">
                        <a href="{{route('shopping.checkout')}}" class="btn green-meadow btn-lg btn-block">
                            <i class="icon-credit-card"></i> &nbsp; Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection