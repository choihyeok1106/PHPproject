{{--category--}}
<li style="line-height:37px;">
    <a data-toggle="collapse" href="#" data-target="#collapse1" aria-expanded="false"
       style="padding-left: 5px;"
       class="pl-5">{{$name}}</a>
    <ul class="margin-bottom-10 margin-top-5 padding-left-10 collapse" id="collapse{{$id}}">
        <li style="line-height:37px;">
            <a data-toggle="tab" href="#tab_2">Membership121123122178127</a>
        </li>
        w
        <li style="line-height:37px;">
            <a data-toggle="tab" href="#tab_2">Membership2</a>
        </li>
        <li style="line-height:37px;">
            <a data-toggle="tab" href="#tab_2">Membership3</a>
        </li>
    </ul>
</li>


{{--resources--}}
<ul class="list-group list-group-flush">
    <h3 class="margin-0">{{$category}}</h3>
    <li class="list-group-item">
        <div class="mt-comment" style="border: 0px">
            <div class="mt-comment-img">
                <img src="/img/files/{{$file}}.svg" class="file-icon">
            </div>
            <div class="mt-comment-body">
                <div class="mt-comment-info">
                                        <span class="mt-comment-author">
                                            <a href="#">Michael Baker</a>
                                        </span>
                    <span class="mt-comment-date">{{$date}}</span>
                </div>
                <div class="mt-comment-text">{{$text}}
                </div>
                <div class="mt-comment-details">
                    <ul class="mt-comment-actions">
                        <li>
                            <a href="" data-toggle="view" title="Preview"> <i class="icon-eye"></i>
                                View</a>
                        </li>
                        <li>
                            <a href="" data-toggle="copy" title="Copy to clipboard"
                               data-copy="copy"> <i
                                        class="icon-link"></i> Copy link </a>
                        </li>
                        <li>
                            <a href="mailto:" data-toggle="send"
                               title="Send to email"> <i
                                        class="icon-envelope"></i> Send to Email
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
</ul>

