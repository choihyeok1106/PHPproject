<?php /** @var \App\Models\HomeInterface $interface */ ?>
<div class="modal fade" id="widget-setting" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">My Widget</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach(App\Constants\HomeWidget::$names as $widget=>$name)
                        <div class="col-md-6">
                            <label class="mt-checkbox mt-checkbox-outline"> {{$name}}
                                <input type="checkbox" value="{{$widget}}"
                                       name="widget" <?=$interface->hasWidget($widget) ? 'checked' : null?>>
                                <span></span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" onclick="saveSettings()" id="settings-save" class="btn green">Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>