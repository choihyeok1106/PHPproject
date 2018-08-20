@extends('layouts.app')
@section('style.plugins')
    <link href="/css/pages/todo-2.min.css" rel="stylesheet" type="text/css"/>
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
                <span>Shopping</span>
            </li>
        </ul>
    </div>

    <div class="todo-ui">
        <div class="todo-sidebar">
            <div class="portlet light category-sidebar">
                <div class="portlet-title">
                    <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                        <span class="caption-subject font-green-sharp bold uppercase">Categories </span>
                    </div>
                </div>
                <div class="portlet-body todo-project-list-content" style="height: auto;">
                    <div class="todo-project-list">
                        <ul class="nav nav-stacked">
                            @foreach($categories as $category)
                                <li>
                                    <a href="javascript:;">
                                        <a href="">{{$category->name}}</a>
                                    </a>
                                </li>
                            @endforeach
                            {{-- <li class="active">
                                 <a href="javascript:;">All </a>
                             </li>
                             <li>
                                 <a href="#"">Bestsellers</a>
                             </li>
                             <li>
                                 <a href="#">Weight Loss</a>
                             </li>
                             <li>
                                 <a href="#">Sports Performance</a>
                             </li>
                             <li>
                                 <a href="#">Nutrition</a>
                             </li>
                             <li>
                                 <a href="#">Energy</a>
                             </li>
                             <li>
                                 <a href="#">Superfruits</a>
                             </li>
                             <li>
                                 <a href="#">Skincare</a>
                             </li>
                             <li>
                                 <a href="#">PURE Enrollment Packs</a>
                             </li>
                             <li>
                                 <a href="#">Water Filtration</a>
                             </li>
                             <li>
                                 <a href="#">Last Chance</a>
                             </li>--}}
                        </ul>
                    </div>
                </div>
            </div>

            <select class="bs-select form-control default category-select">
                @foreach($categories as $category)
                    <option>{{$category->name}}</option>
                @endforeach
                {{--<option>All</option>
                <option>Bestsellers</option>
                <option>Weight Loss</option>
                <option>Sports Performance</option>
                <option>Nutrition</option>
                <option>Energy</option>
                <option>Superfruits</option>
                <option>Skincare</option>
                <option>PURE Enrollment Packs</option>
                <option>Water Filtration</option>
                <option>Last Chance</option>--}}
            </select>≠
        </div>

        <div class="todo-content">
            <div class="search-bar ">

                <div class="m-grid margin-bottom-15">
                    <div class="m-grid-row">
                        <div class="m-grid-col m-grid-col-lg-6 m-grid-col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for Product">
                                <span class="input-group-btn">
                                    <button class="btn blue uppercase bold" type="button">
                                        <i class="icon-magnifier"></i> &nbsp;Search
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="m-grid-col m-grid-col-lg-6 m-grid-col-right m-grid-col-md-4">
                            <select class="bs-select form-control input-small default">
                                <option>New Item</option>
                                <option>Item Name: A-Z</option>
                                <option>Item Name: Z-A</option>
                                <option>PV: High to low</option>
                                <option>PV: Low to high</option>
                                <option>Price: High to low</option>
                                <option>Price: Low to high</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($items as $item)
                    <input type="hidden" value="{{$item->sku}}">
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="portlet light portlet-fit portlet-product">
                            <div class="portlet-body padding-0">
                                <a href="product.html" class="product-image">
                                    <img src="https://shop.livepure.co.kr/upfiles/product/main_4008_gs557k1_2.jpg">
                                </a>
                            </div>

                            <div class="portlet-title">
                                <div class="caption">
                                    <a class="caption-subject uppercase">{{$item->title}}</a>
                                </div>
                                <div class="m-grid">
                                    <div class="m-grid-row">
                                        <div class="m-grid-col m-grid-col-left">
                                            <br>
                                            <span class="font-grey-cascade">13 PV</span>
                                        </div>
                                        <div class="m-grid-col m-grid-col-right">
                                            <button class="btn btn-success" type="button">
                                                <i class="fa fa-shopping-cart"></i> &nbsp; Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-10">
                                        <div class="caption-desc font-grey-cascade">
                                        </div>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- END TODO CONTENT -->
    </div>
@endsection