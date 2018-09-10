@extends('layouts.app')
@section('style.plugins')
    <link href="<?= STATIC_SERVER ?>/vendors/flexslider/flexslider.css" rel="stylesheet" type="text/css"/>
    <link href="<?= STATIC_SERVER ?>/vendors/circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css"/>
    <link href="<?= STATIC_SERVER ?>/vendors/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <!-- BEGIN PAGE HEADER-->
    <h1 class="page-title"> Home
        <small>Dashboard, your current business reports</small>
    </h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="/html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Dashboard</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt">
                    Setting <i class="fa fa-cog"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-lg-12">
            <div class="note note-danger">
                <button type="button" class="note-close close-button close" data-dismiss="modal" aria-hidden="true"
                        style="margin-top: -10px;">×
                </button>
                <h5 class="bold"><i class="icon-bell"></i> &nbsp; MY SMART ALERTS</h5>
                <p>Your autoship volume is below the recommended 100 PV level.</p>
            </div>
        </div>
    </div>

    <?php
    /*
     <div class="row sortable_portlets">
        <div class="col-lg-6 column sortable">
            <!-- Banner-->
            <div class="portlet portlet-sortable light widget-banner widget-box">
                <div class="portlet-body" data-scale="0.5">
                    <!--            <img src="/img/svg/banner.svg?v=5" class="app-svg">-->
                    <div class="flexslider">
                        <ul class="slides"></ul>
                    </div>
                </div>
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase" id="banner-title"></span>
                    </div>
                </div>
            </div>
            <!-- Schedule -->
            <div class="portlet portlet-sortable light calendar widget-box">
                <div class="portlet-title ">
                    <div class="caption">
                        <i class="icon-calendar font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">EVENT SCHEDULE</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- Tracker -->
            <div class="portlet portlet-sortable light widget-tracker widget-box">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase"> RANK TRACKER</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a href="#" class="btn btn-circle btn-outline btn-sm blue">Leadership Rank</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table>
                        <tr>
                            <td><i class="fa fa-angle-left"></i></td>
                            <td>
                                <div class="tile">RANK GOAL</div>
                                <div class="rank">Presidential Black Diamond</div>
                                <div class="desc">
                                    <span class="left">LTV 30,000</span>
                                    <span>|</span>
                                    <span class="right">STV 75,000</span>
                                </div>
                            </td>
                            <td><i class="fa fa-angle-right"></i></td>
                        </tr>
                    </table>
                    <div class="sub">LESSER TEAM VOLUME</div>
                    <div class="chart">
                        <div id="test-circle"></div>
                    </div>
                    <div class="sub">SPONSOR TREE VOLUME</div>
                    <div>
                        <div>
                            <span class="text-success text-18">7,200</span>
                            <span class="text-muted">/ 75,000</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 40%">
                                <span class="sr-only"> 40% Complete (success) </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- empty sortable porlet required for each columns! -->
            <div class="portlet portlet-sortable-empty"></div>
        </div>
        <div class="col-lg-6 column sortable">
            <!-- Summary-->
            <div class="portlet portlet-sortable light widget-summary widget-box">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase"> BUSINESS SUMMARY</span>
                        <span class="caption-helper"></span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <button type="radio" class="btn btn-circle btn-outline green btn-sm disabled" disabled>Current</button>
                            <button type="radio" class="btn btn-circle btn-outline green btn-sm disabled" disabled>Last</button>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table>
                        <tr>
                            <td>
                                <div class="tile"> PERSONAL VOLUME</div>
                                <div class="number" data-counter="counterup" data-value="0"> 0</div>
                                <div class="desc"><span data-counter="counterup" data-value="0">0</span>%</div>
                            </td>
                            <td>
                                <div class="tile"> LAST 4 WEEKS PV</div>
                                <div class="number green" data-counter="counterup" data-value="111"> 111</div>
                                <div class="desc info"> Active</div>
                            </td>
                            <td>
                                <div class="tile"> CURRENT RANK</div>
                                <div class="number rank" title="Ambassador Black Diamond">
                                    Platinum Director
                                </div>
                                <div class="desc">AMBD</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="tile"> SPONSOR TREE VOLUME</div>
                                <div class="number green" data-counter="counterup" data-value="7,200"> 7,200</div>
                                <div class="desc down"><i class="fa fa-caret-down"></i> <span data-counter="counterup" data-value="5.33">5.33</span> %
                                </div>
                            </td>
                            <td>
                                <div class="tile"> LEFT TEAM VOLUME</div>
                                <div class="number" data-counter="counterup" data-value="5,980"> 5,980</div>
                                <div class="desc up"><i class="fa fa-caret-up"></i> <span data-counter="counterup" data-value="100">100</span>%</div>
                            </td>
                            <td>
                                <div class="tile"> RIGHT TEAM VOLUME</div>
                                <div class="number" data-counter="counterup" data-value="2,162,345"> 2,162,345</div>
                                <div class="desc up"><i class="fa fa-caret-up"></i> <span data-counter="counterup" data-value="2.48">2.48</span>%</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="tile">NEW IN LAST 7 DAYS</div>
                                <div class="number" data-counter="counterup" data-value="15"> 15</div>
                                <div class="desc up"><i class="fa fa-caret-up"></i> <span data-counter="counterup" data-value="0.24">0.24</span>%</div>
                            </td>
                            <td>
                                <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                                <div class="number" data-counter="counterup" data-value="11"> 11</div>
                                <div class="desc">Left</div>
                            </td>
                            <td>
                                <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                                <div class="number" data-counter="counterup" data-value="3"> 3</div>
                                <div class="desc">Right</div>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
            <!-- Smart Alert -->
            <div class="portlet portlet-sortable light widget-alert widget-box">
                <div class="portlet-title">

                    <div class="caption">
                        <span class="caption-subject bold uppercase"> TEAM SMART ALERTS</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a href="#" class="btn btn-circle btn-outline btn-sm blue">View all</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height: 360px">
                        <div class="mt-actions">
                            <?php for ($i = 0; $i < 10; $i++) { ?>
                                <div class="mt-action">
                                    <div class="mt-action-body">
                                        <div class="mt-action-row">
                                            <div class="mt-action-info ">
                                                <div class="mt-action-icon ">
                                                    <i class="icon-cup"></i>
                                                </div>
                                                <div class="mt-action-details ">
                                                    <span class="mt-action-author">Autoship Credit Card Expired</span>
                                                    <p class="mt-action-desc">Autoship orders with a credit card that expired last month.</p>
                                                </div>
                                            </div>
                                            <div class="mt-action-buttons">
                                                <span class="badge badge-danger"> 3 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- News -->
            <div class="portlet portlet-sortable light widget-news widget-box">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase"> NEWS FEED</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a href="#" class="btn btn-circle btn-outline btn-sm blue">View all</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php for ($i = 0; $i < 3; $i++) { ?>
                        <div class="mt-comments">
                            <div class="mt-comment">
                                <div class="mt-comment-img">
                                    <img src="https://gplivepurecomsite.files.wordpress.com/2018/07/bahamas_whattopack_7_27_18.jpg"></div>
                                <div class="mt-comment-body">
                                    <div class="mt-comment-info">
                                        <span class="mt-comment-author">Sales Support Holiday Hours</span>
                                        <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                    </div>
                                    <div class="mt-comment-text"> PURE family, just a reminder with the holiday coming up we have specific holiday hours.
                                        We wish you a great Labor Day weekend!
                                    </div>
                                    <div class="mt-comment-details">
                                        <a href="#">View detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- empty sortable porlet required for each columns! -->
            <div class="portlet portlet-sortable-empty"></div>
        </div>
    </div>
     * */
    ?>

    <div class="grid">
        <!-- Banner-->
        <div class="grid-item widget-banner">
            <div id="widget-banner" class="portlet portlet-sortable light">
                <div class="portlet-body" data-scale="0.5">
                    <div class="flexslider res-box" data-scale="0.6">
                        <img src="/img/svg/banner.svg?v=8" class="app-svg">
                        <ul class="slides"></ul>
                    </div>
                </div>
                <div class="portlet-title">
                    <div class="caption">
                        <div class="app-svg"></div>
                        <span class="caption-subject bold uppercase" id="banner-title"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Summary-->
        <div class="grid-item widget-summary">
            <div class="grid-item-content">
                <div class="portlet portlet-sortable light res-box" data-target="#widget-banner">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase"> BUSINESS SUMMARY</span>
                            <span class="caption-helper"></span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <button type="button" id="summary-curr-btn"
                                        class="btn btn-circle btn-outline green btn-sm active">Current
                                </button>
                                <button type="button" id="summary-last-btn"
                                        class="btn btn-circle btn-outline green btn-sm">Last
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body res-box" data-target="1" data-offset="95">
                        <table id="summary-curr-tb">
                            <tr>
                                <td>
                                    <div class="tile"><b>PERSONAL VOLUME</b><span>PV</span></div>
                                    <div class="number" id="curr-pv-val"> 0</div>
                                    <div class="desc" id="curr-pv-per"><i class="fa"></i> <i class="per">0</i>%</div>
                                </td>
                                <td>
                                    <div class="tile"><b>LAST 4 WEEKS PV</b><span>LAST 4</span></div>
                                    <div class="number green" id="curr-last4-val"> 0</div>
                                    <div class="desc" id="curr-last4-active"> Inactive</div>
                                </td>
                                <td>
                                    <div class="tile"><b>CURRENT RANK</b><span>RANK</span></div>
                                    <div class="number rank" id="curr-rank-name">
                                        <b>Unknown</b><span>Unknown</span>
                                    </div>
                                    <div class="desc" id="curr-rank-short">Unknown</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="tile"><b>SPONSOR TREE VOLUME</b><span>STV</span></div>
                                    <div class="number green" id="curr-stv-val">0</div>
                                    <div class="desc" id="curr-stv-per"><i class="fa"></i> <i class="per">0</i> %
                                    </div>
                                </td>
                                <td>
                                    <div class="tile"><b>LEFT TEAM VOLUME</b><span>LTV</span></div>
                                    <div class="number" id="curr-ltv-val"> 0</div>
                                    <div class="desc" id="curr-ltv-per"><i class="fa"></i> <i class="per">0</i>%</div>
                                </td>
                                <td>
                                    <div class="tile"><b>RIGHT TEAM VOLUME</b><span>RTV</span></div>
                                    <div class="number" id="curr-rtv-val"> 0</div>
                                    <div class="desc" id="curr-rtv-per"><i class="fa"></i> <i class="per">0</i>%
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="tile"><b>NEW IN LAST 7 DAYS</b><span>LAST 7</span></div>
                                    <div class="number" id="curr-last7-val"> 0</div>
                                    <div class="desc" id="curr-last7-per"><i class="fa"></i> <i class="per"></i>%
                                    </div>
                                </td>
                                <td>
                                    <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                                    <div class="number" id="curr-psa-left"> 0</div>
                                    <div class="desc">Left</div>
                                </td>
                                <td>
                                    <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                                    <div class="number" id="curr-psa-right"> 0</div>
                                    <div class="desc">Right</div>
                                </td>
                            </tr>
                        </table>
                        <table id="summary-last-tb">
                            <tr>
                                <td>
                                    <div class="tile"><b>PERSONAL VOLUME</b><span>PV</span></div>
                                    <div class="number" id="last-pv-val"> 0</div>
                                    <div class="desc" id="last-pv-per"><i class="fa"></i> <i class="per">0</i>%</div>
                                </td>
                                <td>
                                    <div class="tile"><b>LAST 4 WEEKS PV</b><span>LAST 4</span></div>
                                    <div class="number green" id="last-last4-val"> 0</div>
                                    <div class="desc info" id="last-last4-active"> Inactive</div>
                                </td>
                                <td>
                                    <div class="tile"><b>CURRENT RANK</b><span>RANK</span></div>
                                    <div class="number rank" id="last-rank-name">
                                        <b>Unknown</b><span>Unknown</span>
                                    </div>
                                    <div class="desc" id="last-rank-short">Unknown</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="tile"><b>SPONSOR TREE VOLUME</b><span>STV</span></div>
                                    <div class="number green" id="last-stv-val">0</div>
                                    <div class="desc" id="last-stv-per"><i class="fa"></i> <i class="per">0</i> %
                                    </div>
                                </td>
                                <td>
                                    <div class="tile"><b>LEFT TEAM VOLUME</b><span>LTV</span></div>
                                    <div class="number" id="last-ltv-val"> 0</div>
                                    <div class="desc" id="last-ltv-per"><i class="fa"></i> <i class="per">0</i>%</div>
                                </td>
                                <td>
                                    <div class="tile"><b>RIGHT TEAM VOLUME</b><span>RTV</span></div>
                                    <div class="number" id="last-rtv-val"> 0</div>
                                    <div class="desc" id="last-rtv-per"><i class="fa"></i> <i class="per">0</i>%
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="tile"><b>NEW IN LAST 7 DAYS</b><span>LAST 7</span></div>
                                    <div class="number" id="last-last7-val"> 0</div>
                                    <div class="desc" id="last-last7-per"><i class="fa"></i> <i class="per"></i>%
                                    </div>
                                </td>
                                <td>
                                    <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                                    <div class="number" id="last-psa-left"> 0</div>
                                    <div class="desc">Left</div>
                                </td>
                                <td>
                                    <div class="tile" title="PERSONALLY SPONSORED ACTIVE"> PS ACTIVE</div>
                                    <div class="number" id="last-psa-right"> 0</div>
                                    <div class="desc">Right</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- News -->
        <div class="grid-item widget-news">
            <div class="grid-item-content">
                <div id="widget-news" class="portlet portlet-sortable light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase"> NEWS FEED</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a href="#" class="btn btn-circle btn-outline btn-sm blue">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <img src="/img/svg/news.svg?v=2" class="app-svg">
                        <img src="/img/svg/news.svg?v=2" class="app-svg">
                        <img src="/img/svg/news.svg?v=2" class="app-svg">
                        <div class="mt-comments">
                            <!--
                            <div class="mt-comment">
                                <div class="mt-comment-img">
                                    <img src="https://gplivepurecomsite.files.wordpress.com/2018/07/bahamas_whattopack_7_27_18.jpg"></div>
                                <div class="mt-comment-body">
                                    <div class="mt-comment-info">
                                        <span class="mt-comment-author">Sales Support Holiday Hours</span>
                                        <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                    </div>
                                    <div class="mt-comment-text"> PURE family, just a reminder with the holiday coming up we have specific holiday
                                        hours.
                                        We wish you a great Labor Day weekend!
                                    </div>
                                    <div class="mt-comment-details">
                                        <a href="#">View detail</a>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Smart Alert -->
        <div class="grid-item widget-alert">
            <div class="grid-item-content">
                <div class="portlet portlet-sortable light">
                    <div class="portlet-title">

                        <div class="caption">
                            <span class="caption-subject bold uppercase"> TEAM SMART ALERTS</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a href="#" class="btn btn-circle btn-outline btn-sm blue">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller " style="height: 378px">
                            <div class="mt-actions">
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                <div class="mt-action">
                                    <div class="mt-action-body">
                                        <div class="mt-action-row">
                                            <div class="mt-action-info ">
                                                <div class="mt-action-icon ">
                                                    <i class="icon-cup"></i>
                                                </div>
                                                <div class="mt-action-details ">
                                                    <span class="mt-action-author">Autoship Credit Card Expired</span>
                                                    <p class="mt-action-desc">Autoship orders with a credit card that
                                                        expired last month.</p>
                                                </div>
                                            </div>
                                            <div class="mt-action-buttons">
                                                <span class="badge badge-danger"> 3 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tracker -->
        <div class="grid-item widget-tracker">
            <div class="grid-item-content">
                <div id="widget-tracker" class="portlet portlet-sortable light res-box" data-target="#widget-calendar">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase"> RANK TRACKER</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a href="#" class="btn btn-circle btn-outline btn-sm blue">Leadership Rank</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table>
                            <tr>
                                <td><i class="fa fa-angle-left"></i></td>
                                <td>
                                    <div class="tile">RANK GOAL</div>
                                    <div class="rank">Presidential Black Diamond</div>
                                    <div class="desc">
                                        <span class="left">LTV 30,000</span>
                                        <span>|</span>
                                        <span class="right">STV 75,000</span>
                                    </div>
                                </td>
                                <td><i class="fa fa-angle-right"></i></td>
                            </tr>
                        </table>
                        <div class="sub">LESSER TEAM VOLUME</div>
                        <div class="chart">
                            <div id="test-circle"></div>
                        </div>
                        <div class="sub">SPONSOR TREE VOLUME</div>
                        <div class="stv-bar">
                            <div>
                                <span class="text-success text-18">7,200</span>
                                <span class="text-muted">/ 75,000</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                     aria-valuemin="0" aria-valuemax="100"
                                     style="width: 40%">
                                    <span class="sr-only"> 40% Complete (success) </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Schedule -->
        <div class="grid-item widget-calendar">
            <div class="grid-item-content">
                <div id="widget-calendar" class="portlet portlet-sortable light calendar">
                    <div class="portlet-title ">
                        <div class="caption">
                            <i class="icon-calendar font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">EVENT SCHEDULE</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Activity -->
        <div class="grid-item widget-activity">
            <div class="grid-item-content">
                <div class="portlet portlet-sortable light res-box" data-target="#widget-comunity">
                    <div class="portlet-title ">
                        <div class="caption">
                            <i class="icon-calendar font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">ACTIVITIES</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a href="#" class="btn btn-circle btn-outline btn-sm blue">Courses</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="120">
                            <div class="timeline">
                                <div class="events-wrapper">
                                    <div class="events">
                                        <ol>
                                            <li>
                                                <a href="#0" data-date="0/01/2014"
                                                   class="border-after-red bg-after-red selected">Verbal 1</a>
                                            </li>
                                            <li>
                                                <a href="#0" data-date="1/01/2014"
                                                   class="border-after-red bg-after-red">Verbal 2</a>
                                            </li>
                                            <li>
                                                <a href="#0" data-date="2/01/2014"
                                                   class="border-after-red bg-after-red">Verbal 3</a>
                                            </li>
                                            <li>
                                                <a href="#0" data-date="3/01/2014"
                                                   class="border-after-red bg-after-red">Verbal 4</a>
                                            </li>
                                            <li>
                                                <a href="#0" data-date="4/01/2014"
                                                   class="border-after-red bg-after-red">Verbal 5</a>
                                            </li>
                                            <li>
                                                <a href="#0" data-date="5/01/2014"
                                                   class="border-after-red bg-after-red">Verbal 6</a>
                                            </li>
                                            <li>
                                                <a href="#0" data-date="6/01/2014"
                                                   class="border-after-red bg-after-red">Verbal 7</a>
                                            </li>
                                        </ol>
                                        <span class="filling-line bg-red" aria-hidden="true"></span>
                                    </div>
                                    <!-- .events -->
                                </div>
                                <!-- .events-wrapper -->
                                <ul class="cd-timeline-navigation mt-ht-nav-icon">
                                    <li>
                                        <a href="#0" class="prev inactive btn btn-outline red md-skip">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0" class="next btn btn-outline red md-skip">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- .cd-timeline-navigation -->
                            </div>
                            <!-- .timeline -->
                            <div class="events-content">
                                <ol>
                                    <?php for ($i = 0; $i < 7; $i++) { ?>

                                    <li class="<?= $i == 0 ? 'selected' : null ?>" data-date="<?= $i ?>/01/2014">
                                        <div class="mt-title">
                                            <h2 class="mt-content-title">Improve your social ability <?= $i + 1 ?></h2>
                                        </div>
                                        <div class="mt-author">
                                            <div class="mt-author-name">
                                                <a href="javascript:;" class="font-blue-madison"><?= $i + 1 ?>/7
                                                    Completed</a>
                                            </div>
                                            <div class="mt-author-datetime font-grey-mint">16 January 2014 : 7:45 PM
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="mt-content border-grey-steel">
                                            <p>
                                                Good social skills are an important part of building rich friendships,
                                                enjoying yourself in public,
                                                and succeeding in your career. If you consider yourself an introvert, it
                                                can be hard to engage in
                                                conversation with people you don’t know.

                                            </p>
                                            <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">View
                                                all Courses</a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ol>
                            </div>
                            <!-- .events-content -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- PURE COMMUNITY -->
        <div class="grid-item widget-activity">
            <div class="grid-item-content">
                <div id="widget-comunity" class="portlet portlet-sortable light">
                    <div class="portlet-title ">
                        <div class="caption">
                            <i class="icon-calendar font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">PURE COMMUNITY</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a href="#" class="btn btn-circle btn-outline btn-sm blue">Visit Community</a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" style="height: 338px; ">
                            <div class="general-item-list">
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                <div class="item">
                                    <div class="item-head">
                                        <div class="item-details">
                                            <img class="item-pic rounded" src="/img/users/avatar4.jpg">
                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                            <span class="item-label">3 hrs ago</span>
                                        </div>
                                        <span class="item-status">
                                           <span class="text-info">
                                               <i class="icon-emoticon-smile"></i> 3.7k
                                           </span>
                                            &nbsp;
                                           <span class="text-info">
                                               <i class="icon-bubbles"></i> 2.6k
                                           </span>
                                            &nbsp;
                                        </span>
                                    </div>
                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                        sed diam nonummy nibh euismod
                                        tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/flexslider/jquery.flexslider.js?<?= v() ?>"
            type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/circliful/js/jquery.circliful.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/moment.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/muuri/dist/web-animations-2.3.1.min.js"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/muuri/dist/hammer-2.0.8.min.js"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/muuri/dist/muuri.js"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/horizontal-timeline/horizontal-timeline.js?<?= v() ?>"
            type="text/javascript"></script>
    <script src="/js/pages/dashboard.js?<?= v() ?>" type="text/javascript"></script>
@endsection