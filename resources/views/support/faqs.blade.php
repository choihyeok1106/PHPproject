@extends('layouts.app')
@section('style.plugins')
    <link href="/css/pages/faq.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <h1 class="page-title"> FAQ
        <small>
            {{--general faq page--}}
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Support</span>
            <i class="fa fa-angle-right"></i>
            <span>FAQ</span>
        </small>
    </h1>
    
    <!-- END PAGE HEADER-->
    <div class="faq-page faq-content-1">
        <div class="search-bar ">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." id="faqSearch"></div>
        </div>
        <div class="faq-content-container">
            <div class="row">
                <div id="faqs"></div>
            </div>
        </div>
    </div>
@endsection
@section('script.plugins')
    <script src="<?= js('/js/pages/faq.js') ?>" type="text/javascript"></script>
@endsection
