@extends('layouts.app')
@section('style.plugins')
    <link href="/css/pages/contact.min.css" rel="stylesheet" type="text/css"/>

    <style>
        .tab-nav li {
            display: inline-block;
            cursor: pointer;
            padding: 0;
            margin-right: 7px;
        }

        #map {
            z-index: 3;
            position: absolute;
            width: 100%;
            padding: 0px;
            border-width: 0px;
            margin: 0px;
            left: 0px;
            top: 0px;
            touch-action: pan-x pan-y;
        }

        a[data-country] {
            text-decoration: none;
        }

       .c-content-iconlist-1 > li{
            margin: 2px;
        }
    </style>
@endsection
@section('content')
    <h1 class="page-title"> Contact Us
        <small></small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Support</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Contact Us</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->

    <div class="c-content-feedback-1 c-option-1">
        <div class="row">
            <div class="col-md-6">
                <div class="c-container bg-green">
                    <div class="c-content-title-1 c-inverse">
                        <h3 class="uppercase">Need to know more?</h3>
                        <div class="c-line-left"></div>
                        <p class="c-font-lowercase">Try visiting our FAQ page to learn more about our greatest ever
                            expanding theme,
                            Metronic.</p>
                        <a href="https://livepure.com/about-us" class="btn grey-cararra font-dark" target="_blank">Learn
                            More</a>
                    </div>
                </div>
                <div class="c-container bg-grey-steel">
                    <div class="c-content-title-1">
                        <h3 class="uppercase">Have a question?</h3>
                        <div class="c-line-left bg-dark"></div>

                        <form>
                            <span class="input-group-btn">
                                <button onclick="location.href='faqs'"
                                        class="btn uppercase grey" type="button">Go!</button>
                            </span>
                        </form>
                        <p>Ask your questions away and let our dedicated customer service help you look through our FAQs
                            to get your questions
                            answered!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="c-contact">
                    <div class="c-content-title-1">
                        <h3 class="uppercase">Keep in touch</h3>
                        <div class="c-line-left bg-dark"></div>
                        <p class="c-font-lowercase">Our helpline is always open to receive any inquiry or feedback.
                            Please feel free to drop
                            us an email from the form below and we will get back to you as soon as we can.</p>
                    </div>
                    <form action="{{route('support.contact')}}" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" id="name" name="name"
                                   class="form-control input-md" required></div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" id="email" name="email"
                                   class="form-control input-md" required></div>
                        <div class="form-group">
                            <input type="text" placeholder="Contact Phone" id="phone" name="phone"
                                   class="form-control input-md" required></div>
                        <div class="form-group">
                            <textarea rows="8" id="content" name="content" placeholder="Write comment here ..."
                                      class="form-control input-md" required></textarea>
                        </div>
                        <div class="alert alert-danger" style="display:none"></div>
                        <button type="button" class="btn grey" id="btn_contact_store">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center margin-top-30 margin-bottom-15">
        <a href="#tab-us" data-country="us" data-toggle="tab">
            <button type="button" class="btn dark btn-outline btn_tab active">
                <img alt="" src="/img/flags/en.png"> USA
            </button>
        </a>
        <a href="#tab-kr" data-country="kr" data-toggle="tab">
            <button type="button" class="btn dark btn-outline btn_tab">
                <img alt="" src="/img/flags/kr.png"> KOREA
            </button>
        </a>
        <a href="#tab-jp" data-country="jp" data-toggle="tab">
            <button type="button" class="btn dark btn-outline btn_tab">
                <img alt="" src="/img/flags/jp.png"> JAPAN
            </button>
        </a>
        <a href="#tab-ta" data-country="ta" data-toggle="tab">
            <button type="button" class="btn dark btn-outline btn_tab">
                <img alt="" src="/img/flags/tw.png"> TAIWAN
            </button>
        </a>
        <a href="#tab-ha" data-country="ha" data-toggle="tab">
            <button type="button" class="btn dark btn-outline btn_tab">
                <img alt="" src="/img/flags/en.png"> HAWAII
            </button>
        </a>
    </div>
    <div id="tab-nav" class="tab-content text-center">
        <ul class="tab-nav tab-sub tab-pane fade in active" id="tab-us">
            <li>
                <button class="btn btn-circle green active first" data-area="US_UT">UTAH <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
            <li>
                <button class="btn btn-circle green" data-area="US_TA">TEXAS <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
        </ul>
        <ul class="tab-nav tab-sub tab-pane fade" id="tab-kr">
            <li>
                <button class="btn btn-circle green active first" data-area="KR_SE">서울본사 <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
            <li>
                <button class="btn btn-circle green" data-area="KR_GA">광주지사 <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
            <li>
                <button class="btn btn-circle green" data-area="KR_DA">대구지사 <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
            <li>
                <button class="btn btn-circle green" data-area="KR_BU">부산지사 <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
        </ul>
        <ul class="tab-nav tab-sub tab-pane fade" id="tab-jp">
            <li>
                <button class="btn btn-circle green active first" data-area="JP">Live PURE™ Japan Inc <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
        </ul>
        <ul class="tab-nav tab-sub tab-pane fade" id="tab-ta">
            <li>
                <button class="btn btn-circle green active first" data-area="TA">Live PURE™ TAIWAN <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
        </ul>
        <ul class="tab-nav tab-sub tab-pane fade" id="tab-ha">
            <li>
                <button class="btn btn-circle green first" data-area="HA">Live PURE™ HAWAII <i
                            class="glyphicon glyphicon-map-marker"></i></button>
            </li>
        </ul>
    </div>

    <div class="c-content-contact-1 c-opt-1">
        <div class="row" data-auto-height=".c-height">
            <div class="col-lg-8 col-md-7 c-desktop"></div>
            <div class="col-lg-4 col-md-5">
                <div class="c-body">
                    {{-- c_section --}}
                </div>
            </div>
        </div>
        {{-- <div id="gmapbg" class="c-content-contact-1-gmap" style="height: 615px;"></div>--}}
        <div id="map" style="height: 615px;"></div>
    </div>
@endsection
@section('script.plugins')
    <script src="<?= js('/js/pages/support.js')?>" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_9Kme8aUoqf7yWaF81LLAiATmy1fzn_w&callback=initMap"
            type="text/javascript"></script>
@endsection