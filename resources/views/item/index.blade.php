@extends('layouts.app')
@section('style.plugins')
    <link href="{{css('/css/pages/todo-2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{css('/css/pages/shopping.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <h1 class="page-title" data-menu="my-business">Shopping
        <small>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Orders</span>
            <i class="fa fa-angle-right"></i>
            <span>Shopping</span>
        </small>
    </h1>

    <div class="todo-ui">
        <div class="todo-sidebar">
            <div class="portlet light category-sidebar">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green-sharp bold uppercase">Categories </span>
                    </div>
                </div>
                <div class="portlet-body todo-project-list-content" style="height: auto;">
                    <div class="todo-project-list">
                        <ul id="category-side" class="nav nav-stacked">
                            <li class="active" data-id="0">
                                <a href="javascript:void(0)">All</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <select id="category-mobi" class="form-control default category-select">
                <option value="0">All</option>
            </select>
        </div>

        <div class="todo-content">
            <div class="search-bar ">
                <div class="m-grid margin-bottom-15">
                    <div class="m-grid-row">
                        <div class="m-grid-col m-grid-col-lg-6 m-grid-col-md-8">
                            <div class="input-group">
                                <input type="text" id="product-search-input" class="form-control"
                                       placeholder="Search for Product">
                                <span class="input-group-btn">
                                    <button type="button" id="product-search-btn" class="btn blue uppercase bold">
                                        <i class="icon-magnifier"></i> &nbsp; Search
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="m-grid-col m-grid-col-lg-6 m-grid-col-right m-grid-col-md-4">
                            <select id="product-order-by" class="bs-select form-control input-small default">
                                <option value="id">New Item</option>
                                <option value="na">Item Name: A-Z</option>
                                <option value="nd">Item Name: Z-A</option>
                                <option value="qd">PV: High to low</option>
                                <option value="qa">PV: Low to high</option>
                                <option value="pd">Price: High to low</option>
                                <option value="pa">Price: Low to high</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div id="products" class="row active">
                <div id="svg">
                    @for($i = 0; $i < 12; $i++)
                        <div class="col-md-4 col-lg-3 col-sm-6">

                            <div class="portlet light portlet-fit portlet-product">
                                <div class="portlet-body padding-0">
                                    <div class="svg-product-image" data-toggle="res-box"></div>
                                </div>

                                <div class="portlet-title svg-product-title">
                                    <div class="svg-product-text" style="margin-bottom: 10px"></div>
                                    <div class="svg-product-text" style="width: 60%;"></div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <!-- END TODO CONTENT -->
        </div>

        <div class="clearfix"></div>
    </div>
@endsection
@section('script.plugins')
    <script src="{{js('/js/pages/items.js')}}" type="text/javascript"></script>
@endsection