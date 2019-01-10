@extends('layouts.app')
@section('style.plugins')
    <link href="/css/pages/contact.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <h1 class="page-title"> Contact Us
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Support</span>
            <i class="fa fa-angle-right"></i>
            <span>Contact Us</span>
        </small>
    </h1>
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
        <button type="button" class="btn dark">
            <img alt="" src="/img/flags/us.png"> USA
        </button>
        <button type="button" class="btn dark btn-outline">
            <img alt="" src="/img/flags/kr.png"> KOREA
        </button>
        <button type="button" class="btn dark btn-outline">
            <img alt="" src="/img/flags/jp.png"> JAPAN
        </button>
        <button type="button" class="btn dark btn-outline">
            <img alt="" src="/img/flags/tw.png"> TAIWAN
        </button>
        <button type="button" class="btn dark btn-outline">
            <img alt="" src="/img/flags/th.png"> Thailand
        </button>
        <button type="button" class="btn dark btn-outline">
            <img alt="" src="/img/flags/us.png"> HAWAII
        </button>
    </div>

    <div class="c-content-contact-1 c-opt-1">
        <div class="row" data-auto-height=".c-height">
            <div class="col-lg-8 col-md-6 c-desktop"></div>
            <div class="col-lg-4 col-md-6">
                <div class="c-body">
                    <div class="c-section">
                        <h3>Metronic Inc.</h3>
                    </div>
                    <div class="c-section">
                        <div class="c-content-label uppercase bg-blue">Address</div>
                        <p>25, Lorem Lis Street,
                            <br/>Orange C, California,
                            <br/>United States of America</p>
                    </div>
                    <div class="c-section">
                        <div class="c-content-label uppercase bg-blue">Contacts</div>
                        <p>
                            <strong>T</strong> 800 123 0000
                            <br/>
                            <strong>F</strong> 800 123 8888</p>
                    </div>
                    <div class="c-section">
                        <div class="c-content-label uppercase bg-blue">Social</div>
                        <br/>
                        <ul class="c-content-iconlist-1 ">
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="gmapbg" class="c-content-contact-1-gmap" style="height: 615px;"></div>
    </div>
@endsection
@section('script.plugins')
    <script src="<?= js('/js/pages/support.js')?>" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_9Kme8aUoqf7yWaF81LLAiATmy1fzn_w&callback=initMap"
            type="text/javascript"></script>
@endsection