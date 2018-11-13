<!-- Widget::News -->
<div class="grid-item" id="widget-news" data-widget="news">
    <div class="grid-box widget-news">
        <div class="grid-head">
            <i class="la la-newspaper-o dragger"></i>
            <div class="grid-caption widget-caption">
                NEWS FEED
            </div>
        </div>
        <div class="grid-actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
                <a href="#" class="btn btn-circle btn-outline btn-sm blue">View all</a>
            </div>
        </div>
        <div class="grid-body">
            <div class="grid-wrap">
                <div class="mt-comments scroller" style="height: 324px">
                    <?php for($i=0;$i<3;$i++){?>
                    <div class="svg-news">
                        <div class="left"></div>
                        <div class="right">
                            <div class="svg-text" style="width: 50%;margin-bottom: 15px"></div>
                            <div class="svg-text" style="width: 100%"></div>
                            <div class="svg-text" style="width: 100%"></div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>