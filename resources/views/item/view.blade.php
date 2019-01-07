@extends('layouts.app')

@section('style.plugins')
    <link href="<?= STATIC_SERVER ?>/vendors/flexslider/flexslider.css" rel="stylesheet" type="text/css"/>
    <link href="{{css('/css/pages/shopping.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <h1 class="page-title" data-menu="orders" data-sku="{{$sku}}"> {{$sku}}
        <small>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
            Dashboard
        </small>
        <div class="actions">
            <button type="button" id="settings-show" class="btn btn-icon-only blue">
                <i class="fa fa-cog"></i>
            </button>
        </div>
    </h1>

    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span id="item-title" class="caption-subject sbold font-grey-gallery uppercase"></span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-lg-6 img-list">
                    <div class="img-wrapper">
                        <img id="item-image" src="/img/transparent.png">
                    </div>
                    <ul id="thums" class="thums-list"></ul>
                </div>
                <div class="col-lg-6 property">
                    <div class="m-grid">
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-middle values">
                                <label>YOUR PRICE</label>
                                <div id="item-price" class="val"></div>
                            </div>
                            <div class="m-grid-col m-grid-col-middle values">
                                <label>RETAIL PRICE</label>
                                <div id="item-retail" class="val line-through"></div>
                            </div>
                            <div class="m-grid-col m-grid-col-middle values">
                                <label>YOUR PV</label>
                                <div id="item-qv" class="val"></div>
                            </div>
                        </div>
                    </div>

                    <div class="share margin-top-30">
                        <label>SHARE THIS</label>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>

                    <div id="item-explanation" class="explanation"></div>

                    <div id="item-groups" class="options"></div>

                    <div class="actions">
                        <div class="qty">
                            <a href="javascript:;" data-toggle="mathf-count" data-target="#qty" data-action="-1"
                               class="minus">
                                <i class="fa fa-minus"></i>
                            </a>
                            <input type="text" id="qty" value="1" readonly>
                            <a href="javascript:;" data-toggle="mathf-count" data-target="#qty" data-action="1"
                               class="plus">
                                <i class="fa fa-plus"></i>
                            </a>

                            <button id="add-cart" class="btn btn-success" type="button">
                                <i class="fa fa-shopping-cart"></i> <span class="bold"> Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portlet light bordered description">
        <div class="portlet-title tabbable-line">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#item-long_explanation" data-toggle="tab" aria-expanded="true"> Description </a>
                </li>
                <li class="">
                    <a href="#item-recommended_use" data-toggle="tab" aria-expanded="false"> Recommended Use </a>
                </li>
                <li class="">
                    <a href="#item-shipping_return" data-toggle="tab" aria-expanded="false"> Shipping & Return </a>
                </li>
                <li class="">
                    <a href="#item-supplement_facts" data-toggle="tab" aria-expanded="false"> Supplement facts </a>
                </li>
            </ul>
        </div>
        <div class="portlet-body">
            <div class="tab-content">
                <div class="tab-pane active" id="item-long_explanation"></div>
                <div class="tab-pane" id="item-recommended_use"></div>
                <div class="tab-pane" id="item-shipping_return"></div>
                <div class="tab-pane" id="item-supplement_facts"></div>
            </div>
        </div>
    </div>

    <div id="related" class="portlet light related">
        <div class="portlet-title">
            <div class="caption">
                        <span class="caption-subject sbold font-grey-gallery uppercase">
                            Sponsored products related to this item
                        </span>
            </div>

            <ul class="pagination pagination-circle">
                <li>
                    <a href="javascript:;" class="toggle-prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="toggle-next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>

            <div class="tools margin-right-10">
                <span id="current-slide">1</span> / <span id="max-slide">1</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="flexslider carousel">
                <ul id="related-list" class="slides">
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                    <li>
                        <div class="card social-card share share-other card-product" data-social="item">
                            <<<<<<< HEAD
                            <div class="card-content full-height">
                                <a href="{{route('item.view',123456)}}" class="thumbnail">
                                    <img alt="Person photo"
                                         src="https://shop.livepure.co.kr/upfiles/product/main_4008_gs557k1_2.jpg">
                                    =======
                                    <div class="card-content">
                                        <a href="/product/LP11550" class="thumb" data-toggle="res-box">
                                            <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                                            >>>>>>> 3980d62a486a68b8cb773c44b590c4825a83b0e7
                                        </a>
                                    </div>
                                    <a href="product.php" class="card-header clearfix last">
                                        <h5>PURE BlenderBottle<?= $i + 1 ?></h5>
                                    </a>
                                    <div class="card-price">
                                        $114.95
                                    </div>
                            </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    {{-- widget::setting::modal --}}
    <div class="modal fade" id="modal-cart" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table>
                        <tr>
                            <td class="fst">
                                <h2 class="text-success"><i class="la la-check"></i> Added to Cart</h2>
                                <div class="img-box">
                                    <img src="https://extranet.securefreedom.com/GenesisPure/Shopping/Images/144_GoYin-single-150-blue_1.jpg">
                                </div>
                            </td>
                            <td class="lst">
                                <h3>Cart subtotal <span>(<span class="count">2</span> items)</span>: <b
                                            class="price text-danger">$218.99</b></h3>
                                <div>
                                    <a href="/shopping/cart" class="btn dark btn-outline">Cart</a>
                                    <button type="button" class="btn green">Proceed to checkout</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/flexslider/shCore.js"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/flexslider/jquery.flexslider-min.js"></script>
    <script src="{{js('/js/pages/item.js')}}" type="text/javascript"></script>
@endsection