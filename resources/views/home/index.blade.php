@extends('layouts.app')
@section('style.plugins')
    <link href="<?= STATIC_SERVER ?>/vendors/flexslider/flexslider.css" rel="stylesheet" type="text/css"/>
    <link href="<?= STATIC_SERVER ?>/vendors/circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css"/>
    <link href="<?= STATIC_SERVER ?>/vendors/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= css('/css/pages/home.css') ?>" rel="stylesheet" type="text/css"/>
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
                <button type="button" id="settings-show" class="btn btn-fit-height grey-salt">
                    Setting <i class="fa fa-cog"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <div class="row" id="new-alert">
        <div class="col-lg-12">
            <div class="note note-danger">
                <button type="button" class="note-close close-button close" data-dismiss="modal" aria-hidden="true"
                        style="margin-top: -10px;">×
                </button>
                <h5 class="bold"><i class="icon-bell"></i> &nbsp; MY SMART ALERTS</h5>
                <p></p>
            </div>
        </div>
    </div>

    <div class="grid">
        <?php
        /** @var \App\Models\HomeInterface $interface */
        $interfaces = \App\Supports\UserPrefs::getInterfaces();
        foreach ($interfaces as $interface) {
            $interface->render();
        }
        ?>
    </div>
    <div class="clearfix"></div>

    {{-- widget::setting::modal --}}
    <div class="modal fade" id="modal-widget" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">My Widget</h4>
                </div>
                <div class="modal-body">
                    <div class="row"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" id="widget-save" class="btn green">Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/counterup/jquery.waypoints.min.js"
            type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/counterup/jquery.counterup.min.js"
            type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/flexslider/jquery.flexslider.js"
            type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/circliful/js/jquery.circliful.min.js"
            type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/moment.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/muuri/dist/web-animations-2.3.1.min.js"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/muuri/dist/hammer-2.0.8.min.js"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/muuri/dist/muuri.min.js"></script>

    <script src="<?= js('/js/pages/home.js') ?>" type="text/javascript"></script>
@endsection