<!-- Widget::Activity -->
<div class="grid-item" id="widget-activity" data-widget="activity">
    <div class="grid-box widget-activity">
        <div class="grid-head">
            <i class="la la-bell dragger"></i>
            <div class="grid-caption widget-caption">
                ACTIVITIES
            </div>
        </div>
        <div class="grid-actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
                <a href="#" class="btn btn-circle btn-outline btn-sm blue">Courses</a>
            </div>
        </div>
        <div class="grid-body">
            <div class="grid-wrap">
                <div class="scroller" style="height: 340px; ">
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
                                        <h2 class="mt-content-title">Improve your social
                                            ability <?= $i + 1 ?></h2>
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
                                            Good social skills are an important part of building rich
                                            friendships,
                                            enjoying yourself in public,
                                            and succeeding in your career. If you consider yourself an
                                            introvert, it
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
</div>