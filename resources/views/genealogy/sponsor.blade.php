@extends('layouts.app')
@section('style.plugins')
    <style>
        /*html, body {*/
        /*margin: 0px;*/
        /*padding: 0px;*/
        /*width: 100%;*/
        /*height: 100%;*/
        /*overflow: hidden;*/
        /*text-align: center;*/
        /*font-family: Helvetica;*/
        /*}*/

        /*#tree {*/
        /*width: 100%;*/
        /*height: 100%;*/
        /*position: relative;*/
        /*}*/

        /*[node-id] rect {*/
        /*fill: #fff;*/
        /*border-top: 1px solid #ff0000;*/
        /*border-radius: 0;*/
        /*box-shadow: none;*/
        /*}*/

        /*[node-id='1'] rect {*/
        /*fill: #fff;*/
        /*}*/

        /*.field_0 {*/
        /*font-family: Impact;*/
        /*text-transform: uppercase;*/
        /*fill: #a3a3a3;*/
        /*}*/

        /*.field_1 {*/
        /*fill: #a3a3a3;*/
        /*}*/

        /*[link-id] path {*/
        /*stroke: #750000;*/
        /*}*/

        /*[link-id='[3][4]'] path {*/
        /*stroke: #016e25;*/
        /*}*/

        /*[control-expcoll-id] circle {*/
        /*fill: #750000;*/
        /*}*/

        /*[control-expcoll-id='3'] circle {*/
        /*fill: #016e25;*/
        /*}*/

        /*[control-node-menu-id] circle {*/
        /*fill: #bfbfbf;*/
        /*}*/

        #tree {
            width: 100%;
            height: 100%;
        }

        #tree > svg {
            /*background-color: transparent !important;*/
        }

        .bg-search-table {
            /*background-color: transparent !important;*/
        }

        .bg-search-table input {
            /*background-color: transparent !important;*/
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title">Sponsor
        <small>
            <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
            {{--<span>Genealogy</span>--}}
            {{--<i class="fa fa-angle-right"></i>--}}
            <span>Sponsor</span>
        </small>
    </h1>

    <div class="page-bar">
        {{--<ul class="page-breadcrumb">--}}
            {{--<li>--}}
                {{--<i class="icon-home"></i>--}}
                {{--<a href="/html">Home</a>--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<span>Genealogy</span>--}}
            {{--</li>--}}
        {{--</ul>--}}
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown"
                        data-hover="dropdown"
                        data-delay="1000" data-close-others="true"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->

    <div id="tree"/>


@endsection


@section('script.plugins')
    <script src="<?= js('/vendors/OrgChartJS/orgchart.js') ?>" type="text/javascript"></script>
    <script src="<?= js('/js/pages/genealogy.js') ?>" type="text/javascript"></script>
@endsection
