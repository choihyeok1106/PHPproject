@extends('layouts.app')
@section('style.plugins')
    <link href="<?= STATIC_SERVER ?>/vendors/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <h1 class="page-title"> Calendar
        <small>
            <a href="/html">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Tools</span>
            <i class="fa fa-angle-right"></i>
            <span>Calendar</span>
        </small>
    </h1>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit  calendar">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Calendar</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <!-- BEGIN DRAGGABLE EVENTS PORTLET-->
                            <h3 class="event-form-title margin-bottom-20">Draggable Events</h3>
                            <div id="external-events">
                                <form class="inline-form">
                                    <input type="text" value="" class="form-control" placeholder="Event Title..."
                                           id="event_title"/>
                                    <br/>
                                    <a href="javascript:;" id="event_add" class="btn green"> Add Event </a>
                                </form>
                                <hr/>
                                <div id="event_box" class="margin-bottom-10"></div>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" for="drop-remove">
                                    remove after drop
                                    <input type="checkbox" class="group-checkable" id="drop-remove"/>
                                    <span></span>
                                </label>
                                <hr class="visible-xs"/>
                            </div>
                            <!-- END DRAGGABLE EVENTS PORTLET-->
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <div id="calendar" class="has-toolbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script.plugins')
    <script src="<?= STATIC_SERVER ?>/vendors/moment.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?= STATIC_SERVER ?>/vendors/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/js/pages/calendar.js" type="text/javascript"></script>
@endsection