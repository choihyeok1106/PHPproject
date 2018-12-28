@extends('layouts.app')
@section('style.plugins')
    <link href="/css/pages/profile-2.min.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var j$ = jQuery.noConflict();
    </script>
    <style>
        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .padding-left-17 {
            padding-left: 17px;
        }
    </style>
@endsection
@section('content')
    <h1 class="page-title"> Library
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
                <span>Tools</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Library</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <div class="profile">
        <span class="caption-subject font-dark bold uppercase">Library</span>
        <div class="col-md-4 search-bar pull-right">
            <div class="input-group">
                <div class="input-group-addon" style="border:0; background-color: #e0e0e0">
                    <span class="glyphicon glyphicon-search"></span>
                </div>
                <input type="text" placeholder="Search ..." class="form-control"
                       style="border:0; background-color:#e0e0e0; border-color: #e0e0e0" id="file">
                <div class="input-group-btn">
                    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"
                            style="border:1px; background-color:#e0e0e0;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="#">Action</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            {{--sidebar start--}}
            <ul class="ver-inline-menu tabbable margin-bottom-10 col-md-3" id="library_category">
            </ul>
            <input type="text" value="" id="input_clipboard"
                   style="position: absolute;opacity: 0">
            <div class="col-md-9">
                {{--library start--}}
                <div class="mt-comments libs"id="library_context">
                    <input type="text" value="" id="input_clipboard"
                           style="position:absolute;opacity: 0">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script.plugins')
    <script src="<?= js('/js/pages/library.js') ?>" type="text/javascript"></script>
@endsection