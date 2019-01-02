@extends('layouts.app')

@section('style.plugins')
    <link href="<?= STATIC_SERVER ?>/vendors/flexslider/flexslider.css" rel="stylesheet" type="text/css"/>
    <link href="{{css('/css/pages/shopping.css')}}" rel="stylesheet" type="text/css"/>
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
                <a href="{{route('products.index')}}">Shopping</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Weight Loss</span>
            </li>
        </ul>
    </div>

    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                        <span class="caption-subject sbold font-grey-gallery uppercase">
                            HEALTHTRIM MATCHA VEGAN SHAKE
                        </span>
                <span id="item-sku" class="caption-helper">{{$sku}}</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-lg-6 img-list">
                    <div class="img-wrapper">
                        <img id="thumb" src="/img/transparent.png">
                    </div>
                    <ul id="thums" class="thums-list"></ul>
                </div>
                <div class="col-lg-6 property">
                    <div class="m-grid">
                        <div class="m-grid-row">
                            <div class="m-grid-col m-grid-col-middle values">
                                <label>YOUR PRICE</label>
                                <div class="val">$34.95</div>
                            </div>
                            <div class="m-grid-col m-grid-col-middle values">
                                <label>RETAIL PRICE</label>
                                <div class="val line-through">$46.95</div>
                            </div>
                            <div class="m-grid-col m-grid-col-middle values">
                                <label>YOUR PV</label>
                                <div class="val">28 PV</div>
                            </div>
                        </div>
                    </div>

                    <div class="share margin-top-30">
                        <label>SHARE THIS</label>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>

                    <div class="explanation">
                        GoYin is a great-tasting balancing blend of superfruits, herbs, and other fruits that have been
                        traditionally used to
                        help
                        reduce the impact of stress on the body and mind while enhancing overall well-being.*
                    </div>

                    <div class="options">
                        <label>PRODUCT OPTIONS</label>
                        <div id="options" class="opt-list"></div>
                    </div>

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
                    <a href="#pro-desc" data-toggle="tab" aria-expanded="true"> Description </a>
                </li>
                <li class="">
                    <a href="#pro-return" data-toggle="tab" aria-expanded="false"> Shipping & Return </a>
                </li>
                <li class="">
                    <a href="#pro-fact" data-toggle="tab" aria-expanded="false"> Supplement facts </a>
                </li>
            </ul>
        </div>
        <div class="portlet-body">
            <div class="tab-content">
                <div class="tab-pane active" id="pro-desc">
                    <div class="md-padding ng-binding ng-scope" ng-bind-html="$ctrl.description">
                        <p>1.69 OZ. POUCHES - 6
                            PACK</p>

                        <p>Matcha gets its nutritional value from the unique growing process. Unlike regular green tea
                            leaves, matcha is grown
                            in the shade, increasing the production of the antioxidant chlorophyll. The plants are
                            meticulously covered one
                            month before harvest time, blocking 90% of sunlight. The tea leaves are then steamed and
                            dried
                            after harvesting
                            and then stone-ground into a very fine powder.</p>

                        <p>Our premium-quality matcha is used traditionally in Japanese tea ceremonies where it is
                            highly
                            regarded for its
                            calming effect conducive to meditation. </p>

                        <p>Premium, ceremonial matcha</p>
                        <ul>
                            <li>Naturally supports fat metabolism, which may help curb feelings of hunger</li>
                            <li>Aids in healthy digestion and cleansing</li>
                            <li>Superior antioxidant content. An independent study shows that matcha has over 100 times
                                more
                                antioxidants than
                                traditionally brewed green tea
                            </li>
                        </ul>
                        <p>Sacha inchi complete protein</p>
                        <ul>
                            <li>Contains 20 grams of protein per serving</li>
                            <li>Helps support blood glucose levels already in normal range*</li>
                            <li>Protein-rich sacha inchi contains omega fatty acids and all essential amino acids for
                                sustained energy.
                            </li>
                            <li>Naturally occurring tryptophan in sacha inchi helps serotonin production for elevated
                                mood.
                            </li>
                        </ul>
                        <p>Nutrient-dense chlorella</p>
                        <ul>
                            <li>A great source of nutrients and antioxidant-rich chlorophyll.</li>
                            <li>Naturally found in teas, theanine helps elevate mood, reduce stress, and enhance mental
                                focus and clarity.
                            </li>
                        </ul>
                        <p>Purchase a product flyer in <a
                                    href="http://images.genesispure.com/web/pdf/Matcha.pdf">English</a> or <a
                                    href="http://images.genesispure.com/web/pdf/spanish/Matcha_Spanish.pdf">Spanish</a>.
                        </p>

                        <p>* These statements have not been evaluated by the Food and Drug Administration. This product
                            is
                            not intended to
                            diagnose, treat, cure, or prevent any disease.</p>
                    </div>
                </div>
                <div class="tab-pane" id="pro-return">
                    <p>
                        Add one serving of Matcha Vegan Shake to 8 fl. oz. of purified water or milk substitute and
                        blend
                        well. Use as a meal
                        replacement or snack in conjunction with the entire HealthTrim® product line to help support
                        your
                        weight management
                        goals.
                    </p>
                </div>
                <div class="tab-pane" id="pro-fact">
                    <img src="https://images.livepure.com/web/supfacts/GP00349.jpg">
                </div>
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
                                <a href="{{route('products.show',123456)}}" class="thumbnail">
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
                                <h3>Cart subtotal <span>(<span class="count">2</span> items)</span>: <b class="price text-danger">$218.99</b></h3>
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
    <script src="{{js('/js/pages/product.js')}}" type="text/javascript"></script>
@endsection