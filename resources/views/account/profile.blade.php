@extends('layouts.app')

@section('style.plugins')
    <link href="/css/pages/profile-2.css?<?= v() ?>" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <h1 class="page-title"> Profile
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Profile</span>
        </small>
    </h1>

    <div class="portlet light profile">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase"></span>
                <span class="caption-helper">{{--{{$rep->left_leg}}--}}</span>
            </div>
            <div class="actions">
                <a href="settings.php" class="btn btn-circle btn-default">
                    <i class="fa fa-pencil"></i> Edit </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-unstyled profile-nav">
                        <li>
                            <img src="/img/profile/people19.png" class="img-responsive pic-bordered" alt="">
                        </li>
                        <li><a href="javascript:;"> My Profile </a></li>
                        <li><a href="javascript:;"> My Calendar </a></li>
                        <li><a href="javascript:;"> My Orders</a></li>
                        <li><a href="javascript:;"> My Autoship </a></li>
                        <li><a href="javascript:;"> My Address </a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-7 profile-info">
                            <h1 class="font-green sbold uppercase">{{--{{$rep->full_name()}}--}}</h1>
                            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt laoreet
                                dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat
                                volutpat.
                            </p>
                            <p>
                                <a href="javascript:;"> www.livepure.com/john-doe </a>
                            </p>
                            <ul class="list-inline">

                                <li>
                                    <i class="fa fa-map-marker"></i>{{--{{$rep->shipping->country}}--}}
                                </li>
                                <li>
                                    <i class="fa fa-calendar"></i>{{--{{$rep->birth_date}}--}}
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>{{--{{$rep->email}}--}}
                                </li>
                                <li>
                                    <i class="la la-phone"></i> {{--{{$rep->phones->Cell}}--}}
                                </li>
                                <li>
                                    <i class="la la-building-o"></i> {{--{{$rep->company}}--}}
                                </li>
                            </ul>
                        </div>
                        <!--end col-md-8-->
                        <div class="col-md-5">
                            <div class="portlet sale-summary">
                                <div class="portlet-title">
                                    <div class="caption font-red sbold"> Summary</div>
                                </div>
                                <div class="portlet-body">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span class="sale-info"> Rank</span>
                                            <span class="sale-num">{{--{{$rep->ranks->display->name}}--}}</span>
                                        </li>
                                        <li>
                                            <span class="sale-info"> Placement</span>
                                            <span class="sale-num"> <a href="#"> - </a></span>
                                        </li>
                                        <li>
                                            <span class="sale-info"> Sponsor </span>
                                            <span class="sale-num"> <a
                                                        href="#">	{{--{{$rep->sponsor}}--}}</a> </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end col-md-4-->
                    </div>
                    <!--end row-->
                    <div class="tabbable-line tabbable-custom-profile">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_11" data-toggle="tab" aria-expanded="true"> Latest Customers </a>
                            </li>
                            <li>
                                <a href="#tab_1_22" data-toggle="tab" aria-expanded="true"> Feeds </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1_11">
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                                <i class="fa fa-briefcase"></i> Company
                                            </th>
                                            <th class="hidden-xs">
                                                <i class="fa fa-question"></i> Descrition
                                            </th>
                                            <th>
                                                <i class="fa fa-bookmark"></i> Amount
                                            </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="javascript:;"> Pixel Ltd </a>
                                            </td>
                                            <td class="hidden-xs"> Server hardware purchase</td>
                                            <td> 52560.10$
                                                <span class="label label-success label-sm"> Paid </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;">
                                                    View </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:;"> - </a>
                                            </td>
                                            <td class="hidden-xs"> - </td>
                                            <td> -$
                                                <span class="label label-warning label-sm"> Pending </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;">
                                                    View </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:;"> - </a>
                                            </td>
                                            <td class="hidden-xs"> - </td>
                                            <td> -$
                                                <span class="label label-warning label-sm"> Pending </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;">
                                                    View </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:;">-</a>
                                            </td>
                                            <td class="hidden-xs"> -</td>
                                            <td> -$
                                                <span class="label label-danger label-sm"> Overdue </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;">
                                                    View </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:;"> -</a>
                                            </td>
                                            <td class="hidden-xs"> -</td>
                                            <td> -$
                                                <span class="label label-success label-sm"> Paid </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;">
                                                    View </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:;"> - </a>
                                            </td>
                                            <td class="hidden-xs"> - </td>
                                            <td> -$
                                                <span class="label label-warning label-sm"> Pending </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;">
                                                    View </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:;"> FoodMaster Ltd </a>
                                            </td>
                                            <td class="hidden-xs"> Company Anual Dinner Catering</td>
                                            <td> 12400.00$
                                                <span class="label label-success label-sm"> Paid </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;">
                                                    View </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--tab-pane-->
                            <div class="tab-pane" id="tab_1_22">
                                <div class="tab-pane active" id="tab_1_1_1">
                                    <div class="slimScrollDiv"
                                         style="position: relative; overflow: hidden; width: auto; height: 290px;">
                                        <div class="scroller" data-height="290px" data-always-visible="1"
                                             data-rail-visible1="1"
                                             data-initialized="1" style="overflow: hidden; width: auto; height: 290px;">
                                            <ul class="feeds">
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> You have 4 pending tasks.
                                                                    <span class="label label-danger label-sm"> Take action
                                                                                            <i class="fa fa-share"></i>
                                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New version v1.4 just lunched!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 20 mins</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-danger">
                                                                    <i class="fa fa-bolt"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Database server #12 overloaded.
                                                                    Please fix the issue.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 24 mins</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 30 mins</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-success">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 40 mins</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-warning">
                                                                    <i class="fa fa-plus"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 1.5 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Web server hardware needs to be
                                                                    upgraded.
                                                                    <span class="label label-inverse label-sm"> Overdue </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 2 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 3 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-warning">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 5 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 18 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours</div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care
                                                                    of it.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="slimScrollBar"
                                             style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                                        <div class="slimScrollRail"
                                             style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!--tab-pane-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection