<?php /** @var \App\Models\UserCourse[] $courses */ ?>
<div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="100">
    <div class="timeline">
        <div class="events-wrapper">
            <div class="events">
                <ol>
                    @foreach($courses as $k=> $course)
                        <li>
                            <a href="#0" data-date="{{$course->date}}"
                               class="border-after-red bg-after-red <?=$k == 0 ? 'selected' : null?>">
                                {{$course->goal}}
                            </a>
                        </li>
                    @endforeach

                    {{--
                    <li>
                        <a href="#0" data-date="28/02/2014" class="border-after-red bg-after-red">Verbal
                            2</a>
                    </li>
                    <li>
                        <a href="#0" data-date="20/04/2014" class="border-after-red bg-after-red">Verbal
                            3</a>
                    </li>
                    <li>
                        <a href="#0" data-date="20/05/2014" class="border-after-red bg-after-red">Verbal
                            4</a>
                    </li>
                    <li>
                        <a href="#0" data-date="09/07/2014" class="border-after-red bg-after-red">Verbal
                            5</a>
                    </li>
                    <li>
                        <a href="#0" data-date="30/08/2014" class="border-after-red bg-after-red">Verbal
                            6</a>
                    </li>
                    <li>
                        <a href="#0" data-date="03/03/2015" class="border-after-red bg-after-red">Verbal 7</a>
                    </li>
                    --}}
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
            @foreach($courses as $k=> $course)
                <li class="<?=$k == 0 ? 'selected' : null?>" data-date="{{$course->date}}">
                    <div class="mt-title">
                        <h2 class="mt-content-title">{{$course->title}}</h2>
                    </div>
                    <div class="mt-author">
                        <div class="mt-author-name">
                            <a href="javascript:;" class="font-blue-madison">{{$k+1}} /7 Completed</a>
                        </div>
                        <div class="mt-author-datetime font-grey-mint">{{$course->end}}</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="mt-content border-grey-steel">
                        <p>{{$course->detail}}</p>
                        <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                            View all Courses
                        </a>
                    </div>
                </li>
            @endforeach
            {{--
             <li class="selected" data-date="16/01/2014">
                <div class="mt-title">
                    <h2 class="mt-content-title">
                        Improve your social ability 1
                    </h2>
                </div>
                <div class="mt-author">
                    <div class="mt-author-name">
                        <a href="javascript:;" class="font-blue-madison">1 /7 Completed</a>
                    </div>
                    <div class="mt-author-datetime font-grey-mint">16 January 2014 : 7:45 PM</div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-content border-grey-steel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod
                        eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis
                        eu, mi felis, aliquam at iaculis mi felis, aliquam
                        at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit
                        amet molestie elit, vel placerat ipsum. Ut consectetur odio non est rhoncus
                        volutpat.</p>
                    <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                        View all Courses
                    </a>
                </div>
            </li>
            <li data-date="28/02/2014">
                <div class="mt-title">
                    <h2 class="mt-content-title">Improve your social ability 2</h2>
                </div>
                <div class="mt-author">
                    <div class="mt-author-name">
                        <a href="javascript:;" class="font-blue-madison">2 /7 Completed</a>
                    </div>
                    <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-content border-grey-steel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod
                        eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis
                        eu, finibus eu ex. Integer efficitur leo eget
                        dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc.
                        Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet
                        molestie elit, vel placerat ipsum. Ut consectetur
                        odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare,
                        lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras
                        commodo id massa at condimentum. Praesent
                        dignissim luctus risus sed sodales.</p>
                    <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                        View all Courses
                    </a>
                </div>
            </li>
            <li data-date="20/04/2014">
                <div class="mt-title">
                    <h2 class="mt-content-title">Improve your social ability 3</h2>
                </div>
                <div class="mt-author">
                    <div class="mt-author-name">
                        <a href="javascript:;" class="font-blue">3 /7 Completed</a>
                    </div>
                    <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-content border-grey-steel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod
                        eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis
                        eu, finibus eu ex. Integer efficitur leo eget
                        dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc.
                        Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet
                        molestie elit, vel placerat ipsum. Ut consectetur
                        odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare,
                        lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras
                        commodo id massa at condimentum. Praesent
                        dignissim luctus risus sed sodales.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio,
                        dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa
                        ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. </p>
                    <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                        View all Courses
                    </a>
                </div>
            </li>
            <li data-date="20/05/2014">
                <div class="mt-title">
                    <h2 class="mt-content-title">Improve your social ability 4</h2>
                </div>
                <div class="mt-author">
                    <div class="mt-author-name">
                        <a href="javascript:;" class="font-blue-madison">4 /7 Completed</a>
                    </div>
                    <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-content border-grey-steel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod
                        eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis
                        eu, finibus eu ex. Integer efficitur leo eget
                        dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc.
                        Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet
                        molestie elit, vel placerat ipsum. Ut consectetur
                        odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare,
                        lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras
                        commodo id massa at condimentum. Praesent
                        dignissim luctus risus sed sodales.</p>
                    <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                        View all Courses
                    </a>
                </div>
            </li>
            <li data-date="09/07/2014">
                <div class="mt-title">
                    <h2 class="mt-content-title">Improve your social ability 5</h2>
                </div>
                <div class="mt-author">
                    <div class="mt-author-name">
                        <a href="javascript:;" class="font-blue-madison">5 /7 Completed</a>
                    </div>
                    <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-content border-grey-steel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio,
                        dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa
                        ad debitis unde.</p>
                    <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                        View all Courses
                    </a>
                </div>
            </li>
            <li data-date="30/08/2014">
                <div class="mt-title">
                    <h2 class="mt-content-title">Improve your social ability 6</h2>
                </div>
                <div class="mt-author">
                    <div class="mt-author-name">
                        <a href="javascript:;" class="font-blue-madison">6 /7 Completed</a>
                    </div>
                    <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-content border-grey-steel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio,
                        dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa
                        ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio,
                        dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa
                        ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio,
                        dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa
                        ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                        qui ut. </p>
                    <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                        View all Courses
                    </a>
                </div>
            </li>
            <li data-date="03/03/2015">
                <div class="mt-title">
                    <h2 class="mt-content-title">Improve your social ability 7</h2>
                </div>
                <div class="mt-author">
                    <div class="mt-author-name">
                        <a href="javascript:;" class="font-blue-madison">7 /7 Completed</a>
                    </div>
                    <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-content border-grey-steel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod
                        eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis
                        eu, finibus eu ex. Integer efficitur leo eget
                        dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc.
                        Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet
                        molestie elit, vel placerat ipsum. Ut consectetur
                        odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare,
                        lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras
                        commodo id massa at condimentum. Praesent
                        dignissim luctus risus sed sodales.</p>
                    <a href="javascript:;" class="btn btn-circle btn-outline btn-sm blue">
                        View all Courses
                    </a>
                </div>
            </li>
            --}}
        </ol>
    </div>
    <!-- .events-content -->
</div>

