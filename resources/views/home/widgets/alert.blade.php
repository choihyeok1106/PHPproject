<!-- Widget::Smart Alert -->
<div class="grid-item" id="widget-alert" data-widget="{{$id}}">
    <div class="grid-box widget-alert">
        <div class="grid-head">
            <div class="grid-caption widget-caption">
                TEAM SMART ALERTS
            </div>
        </div>
        <div class="grid-actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
                <a href="#" class="btn btn-circle btn-outline btn-sm blue">View all</a>
            </div>
        </div>
        <div class="grid-body">
            <div class="grid-wrap">
                <div class="mt-actions scroller" style="height: 324px">
                    @foreach(\App\Constants\SmartAlertType::types() as $type)
                        <div class="mt-action" data-type="{{$type->type}}">
                            <div class="mt-action-body">
                                <div class="mt-action-row">
                                    <div class="mt-action-info ">
                                        <div class="mt-action-icon ">
                                            <i class="{{$type->style}}"></i>
                                        </div>
                                        <div class="mt-action-details ">
                                            <a href="#" class="mt-action-author">{{$type->title}}</a>
                                            <p class="mt-action-desc">{{$type->description}}</p>
                                        </div>
                                    </div>
                                    <div class="mt-action-buttons">
                                        <span class="badge badge-danger"> 0 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>