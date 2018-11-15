<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <img src="/img/logo_white.png" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <div class="search-form search-form-expanded">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ __('layouts/common/header.search') }}"
                           name="query">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </div>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN TODO DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="{{route('shopping.cart')}}" class="dropdown-toggle">
                            <i class="la la-shopping-cart"></i>
                            <span class="badge badge-default" id="head-cart-count"> 0 </span>
                        </a>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle quick-sidebar-toggler">
                            <i class="la la-bullhorn"></i>
                            <span class="badge badge-default" id="head-notice-count"> 0 </span>
                        </a>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN >--
                    <!-- BEGIN INBOX DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle quick-sidebar-toggler">
                            <i class="la la-bell"></i>
                            <span class="badge badge-default" id="head-alert-count"> 0 </span>
                        </a>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN dropdown-hoverable -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img alt="" class="img-circle" src="/img/avatar3_small.jpg"/>
                            <span class="username username-hide-on-mobile"> Nick </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{route('team.index')}}"><i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="{{route('tools.calendar')}}"><i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="{{route('orders.index')}}"><i class="icon-basket-loaded"></i> My Orders </a>
                            </li>
                            <li>
                                <a href="{{route('autoships.index')}}"><i class="icon-clock"></i> My Autoship </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{route('account.index')}}"><i class="icon-settings"></i> Settings </a>
                            </li>
                            <li>
                                <a href="{{route('login.logout')}}"><i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-language">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" src="/img/flags/{{ __('layouts/common/header.locale') }}.png">
                            <span class="langname">{{ strtoupper(__('layouts/common/header.locale')) }} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('locale', 'en') }}">
                                    <img alt="" src="/img/flags/en.png"> English </a>
                            </li>
                            <li>
                                <a href="{{ route('locale', 'kr') }}">
                                    <img alt="" src="/img/flags/kr.png"> 한국어 </a>
                            </li>
                            <li>
                                <a href="{{ route('locale', 'cn') }}">
                                    <img alt="" src="/img/flags/cn.png"> 中文 - 简体 </a>
                            </li>
                            <li>
                                <a href="{{ route('locale', 'mm') }}">
                                    <img alt="" src="/img/flags/mm.png"> 中文 - 繁體 </a>
                            </li>
                            <li>
                                <a href="{{ route('locale', 'jp') }}">
                                    <img alt="" src="/img/flags/jp.png"> 日本語 </a>
                            </li>
                            <li>
                                <a href="{{ route('locale', 'mx') }}">
                                    <img alt="" src="/img/flags/mx.png"> Español - Mexico </a>
                            </li>
                            <li>
                                <a href="{{ route('locale', 'cr') }}">
                                    <img alt="" src="/img/flags/cr.png"> Español - Costa Rica </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->