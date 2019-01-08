@extends('layouts.app')

@section('content')
    <h1 class="page-title"> Order Complete
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Order Complete</span>
        </small>
    </h1>


    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase"> Thank you</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <p>
                        Congratulations !
                    </p>
                    <div class="text-right">
                        <a href="{{route('products.index')}}" class="btn btn-default btn-cons" type="button">
                            <i class="fa fa-shopping-cart"></i> &nbsp; Continue Shopping
                        </a>

                        <a href="{{route('shopping.cart')}}" class="btn btn-success btn-cons" type="button">
                            <i class="fa fa-check"></i> &nbsp; Finish
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection