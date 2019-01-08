@extends('layouts.app')

@section('style.plugins')
    <link href="{{css('/css/pages/shopping.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <h1 class="page-title"> Shopping Cart
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Shopping Cart</span>
        </small>
    </h1>

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
                        <tbody id="cart-items"></tbody>
                    </table>

                    <div class="promotions">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control default"></select>
                            </div>
                        </div>
                        <div class="well"></div>
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
                        <div class="m-grid-row total-bot">
                            <div class="m-grid-col m-grid-col-md-6">Estimated Subtotal</div>
                            <div id="sub-total" class="m-grid-col m-grid-col-md-6 font-purple">$0</div>
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