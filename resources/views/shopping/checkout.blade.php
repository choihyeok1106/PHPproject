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
        <div class="col-lg-8">
            <!-- Address Information-->
            <div class="portlet light shipping-info">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="la la-map-pin"></i>
                        <span class="caption-subject bold uppercase"> Address Information</span>
                    </div>
                </div>
                <div class="portlet-body static-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>
                                Shipping Address
                                <button type="button" id="shipping-btn" class="btn btn-xs green">
                                    <i class="fa fa-pencil"></i> Edit
                                </button>
                            </h5>
                            <div id="shipping-addr" class="form-group value"></div>
                        </div>

                        <div class="col-md-6">
                            <h5>
                                Billing Address
                                <button type="button" id="billing-btn" class="btn btn-xs green">
                                    <i class="fa fa-pencil"></i> Edit
                                </button>
                            </h5>
                            <div id="billing-addr" class="form-group value"></div>
                        </div>
                    </div>


                    <div class="form-group form-md-radios">
                        <div class="md-radio-inline">
                            <label>
                                <input type="radio" id="statement1" value="1" name="ship-invoice" checked>
                                With Invoice Include
                            </label>

                            <label>
                                <input type="radio" id="statement2" value="0" name="ship-invoice">
                                Without Invoice
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-11">
                            <div class="form-group form-md-radios">
                                <input type="text" id="ship-notice" class="form-control" placeholder="Shipping Notice">
                                <span class="help-block">Please specify your request when you are absent (30 characters or less).</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Shipping Cart-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="caption-subject bold uppercase"> Your Shopping Cart</span>
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
                                    <input type="text" value="1" readonly>
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

            <!--Payments -->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-credit-card"></i>
                        <span class="caption-subject bold uppercase"> Payment method </span>
                    </div>
                </div>
                <div id="payments" class="portlet-body">
                    <div class="panel-group accordion scrollable" id="accordion1">
                        @foreach($payments as $k => $payment)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse"
                                           data-parent="#accordion1" href="#collapse_{{$payment->id}}"
                                           aria-expanded="false"> {{$payment->name}} </a>
                                    </h4>
                                </div>
                                <div id="collapse_{{$payment->id}}" data-id="{{$payment->id}}"
                                     data-action="{{$payment->processor}}"
                                     class="panel-collapse  collapse {{$k > 0 ? '' : 'in'}}">
                                    <div class="panel-body">
                                        @includeIf("shopping.payments.{$payment->processor}",['payment'=>$payment])
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row static-info hide">
                        <div class="col-md-8 name">
                            <i class="fa fa-cc-mastercard font-16"></i> MasterCard ending in 6666
                        </div>
                        <div class="col-md-4 value text-right">
                            $20
                        </div>
                    </div>
                    <div class="row-divider hide"></div>
                    <div class="row static-info hide">
                        <div class="col-md-8 name">
                            <i class="fa fa-cc-visa font-16"></i> Visa ending in 8888
                        </div>
                        <div class="col-md-4 value text-right">
                            $7.95
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Total -->
        <div class="col-lg-4 totals">
            <div class="fixed-aside" data-top="88" data-offset="15" data-class="page-fixed-aside">
                <!--Shipping methods-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-truck"></i>
                            <span class="caption-subject bold uppercase">Delivery option</span>
                        </div>
                        <div class="actions hide">
                            <a href="javascript:;" class="btn btn-circle btn-default">
                                <i class="fa fa-pencil"></i> Change
                            </a>
                        </div>
                    </div>
                    <div id="shipping-methods" class="portlet-body"></div>
                </div>

                <div class="portlet light ">
                    <div class="portlet-body">
                        <div class="m-grid">
                            <div class="m-grid-row total-top">
                                <div class="m-grid-col m-grid-col-md-6">PV Total</div>
                                <div id="total-qv" class="m-grid-col m-grid-col-md-6"></div>
                            </div>
                            <div class="m-grid-row">
                                <div class="m-grid-col m-grid-col-md-6 padding-top-15">Subtotal</div>
                                <div id="total-items" class="m-grid-col m-grid-col-md-6 padding-top-15"></div>
                            </div>
                            <div class="m-grid-row">
                                <div class="m-grid-col m-grid-col-md-6">Tax Total</div>
                                <div id="total-tax" class="m-grid-col m-grid-col-md-6"></div>
                            </div>
                            <div class="m-grid-row">
                                <div class="m-grid-col m-grid-col-md-6">Handling Fee</div>
                                <div id="total-handling" class="m-grid-col m-grid-col-md-6"></div>
                            </div>
                            <div class="m-grid-row">
                                <div class="m-grid-col m-grid-col-md-6">Shipping Total</div>
                                <div id="total-shipping" class="m-grid-col m-grid-col-md-6"></div>
                            </div>
                            <div class="m-grid-row">
                                <div class="m-grid-col m-grid-col-md-6">Discount</div>
                                <div id="total-discount" class="m-grid-col m-grid-col-md-6"></div>
                            </div>
                            <div class="m-grid-row total-bot">
                                <div class="m-grid-col m-grid-col-md-6">Total</div>
                                <div id="total-grand" class="m-grid-col m-grid-col-md-6 font-purple"></div>
                            </div>
                        </div>

                        <div id="alert-danger" class="alert alert-danger"></div>

                        <div class="total-act">
                            <button id="btn-place-order" class="btn green-meadow btn-lg btn-block" disabled>
                                <i class="icon-basket-loaded"></i> &nbsp;Place your order
                            </button>
                        </div>
                    </div>
                </div>
                @includeIf("shopping.terms." . country())
            </div>

        </div>
    </div>

    <div class="modal fade" id="address-list" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Addresses</h4>
                </div>
                <div class="modal-body">
                    <div class="scroller" style="height: 360px; ">
                        <div class="row" id="address-list-box"></div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green">New Address</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/jquery-inputmask/jquery.inputmask.bundle.min.js"
            type="text/javascript"></script>
    @foreach($payments as $payment)
        {!! $payment->js() !!}
    @endforeach
    <script src="{{js('/js/pages/checkout.js')}}" type="text/javascript"></script>
@endsection