@extends('layouts.app')

@section('style.plugins')
    <link href="<?= STATIC_SERVER ?>/vendors/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Order Details</span>
            </li>
        </ul>
    </div>

    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-basket-loaded"></i>
                <span class="caption-subject bold uppercase"> Order # 6178353</span>
                <span class="badge badge-success text-uppercase"> Shipped </span>
            </div>
            <div class="actions">
                <a href="invoice.php" class="btn btn-circle btn-default">
                    <i class="la la-print"></i> Invoice
                </a>
                <a href="javascript:;" class="btn btn-circle btn-default">
                    <i class="la la-close"></i> Cancel Order
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-lg-4 m-b-15">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-info"></i>
                                <span class="caption-helper">Order Information</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-5 name"> Order Date:</div>
                                <div class="col-md-7 value"> 6/29/2018</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Order Type:</div>
                                <div class="col-md-7 value"> Autoship Order</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Shipping:</div>
                                <div class="col-md-7 value">Standard + M</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Tracking :</div>
                                <div class="col-md-7 value">
                                    <a href="#">#467054710687083</a><br>
                                    <a href="#" class="margin-top-5">#467054710687083</a><br>
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Payment:</div>
                                <div class="col-md-7 value"><i class="fa fa-cc-visa font-16"></i> Visa ending in 8888
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 m-b-15">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-pointer"></i>
                                <span class="caption-helper">Shipping Address</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-12 value">
                                    Jhon Done
                                    <br> #24 Park Avenue Str
                                    <br> New York
                                    <br> Connecticut, 23456 New York
                                    <br> United States
                                    <br> T: 123123232
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-credit-card"></i>
                                <span class="caption-helper">Order Summary</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-5 name"> SubTotal:</div>
                                <div class="col-md-7 value text-right"> $200.70</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Shipping:</div>
                                <div class="col-md-7 value  text-right"> $10.01</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Handling Fee :</div>
                                <div class="col-md-7 value  text-right"> $2.00</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Tax:</div>
                                <div class="col-md-7 value  text-right"> $0.00</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name font-16"> Grand Total:</div>
                                <div class="col-md-7 value  text-right font-16 font-purple"> $212.71</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <tbody>
                <?php for ($n = 0; $n < 3; $n++) { ?>
                <tr>
                    <td>
                        <a href="product.php" class="thumbnail">
                            <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                        </a>
                    </td>
                    <td>
                        <a href="product.php">Webarch UI Framework Dashboard UI Pack</a>
                    </td>
                    <td class="text-right volume"> Qty 1</td>
                    <td class="text-right volume"> $24.95</td>
                    <td class="text-right volume"> 10 PV</td>
                    <td class="text-right volume"> SHIPPED</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
@endsection