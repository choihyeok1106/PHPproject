<?php /** @var \App\Models\CartItem[]|\Illuminate\Support\Collection $items */?>
@extends('layouts.app')

@section('style.plugins')
    <link href="{{css('/css/pages/shopping.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <h1 class="page-title" data-menu="orders">Shopping Cart
        <small>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Shopping</span>
            <i class="fa fa-angle-right"></i>
            <span>Checkout</span>
        </small>
    </h1>

    <div class="row checkout">
        <div class="col-lg-5">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart hide"></i>
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
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price()}}</td>
                                <td>{{$item->qv()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <table class="table hide">
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

                    <table class="table hide">
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
        <!--Shippint methods-->
        <div class="col-lg-4">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-truck hide"></i>
                        <span class="caption-subject bold uppercase">Choose a delivery option</span>
                    </div>
                    <div class="actions hide">
                        <a href="javascript:;" class="btn btn-circle btn-default">
                            <i class="fa fa-pencil"></i> Change
                        </a>
                    </div>
                </div>
                <div id="shipping-methods" class="portlet-body">
                    <label>
                        <input type="radio" name="shipping-method" value="1"> 우체국택배(Korea Ground)
                    </label>
                    <label>
                        <input type="radio" name="shipping-method" value="1"> 우체국택배(Korea Ground)
                    </label>
                </div>
            </div>

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-credit-card hide"></i>
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
                        <i class="la la-map-pin hide"></i>
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

                    <div class="form-group form-md-radios">
                        <label>Shipping Notice</label>
                        <input type="text" class="form-control">
                        <span class="help-block">Please specify your request when you are absent (30 characters or less).</span>
                    </div>
                </div>
            </div>

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-text-o hide"></i>
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
                        <a href="{{route('shopping.complete')}}" class="btn green-meadow btn-lg btn-block">
                            <i class="icon-basket-loaded"></i> &nbsp; Place your order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.plugins')
    <script src="{{js('/js/pages/checkout.js')}}" type="text/javascript"></script>
@endsection