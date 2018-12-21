<div class="mt-comment">
    <div class="mt-comment-img">
        <img src="/img/files/mp4.svg" class="file-icon">
    </div>
    <div class="mt-comment-body">
        <div class="mt-comment-info">
            <span class="mt-comment-author">
                <a href="#">{{$comment-author}}</a>
            </span>
            <span class="mt-comment-date">{{--26 Feb, 10:30AM--}}{{$comment_date}}</span>
        </div>
        <div class="mt-comment-text"> {{$comment_text}}
        </div>
        <div class="mt-comment-details">
            <ul class="mt-comment-actions">
                <li>
                    <a href="#"> <i class="icon-eye"></i> View</a>
                </li>
                <li>
                    <a href="#"> <i class="icon-link"></i> Copy link </a>
                    <input type="hidden" value="{{$link}}" data-copy="copy" style="opacity:0">
                </li>
                <li>
                    <a href="mailto:{{ $email }}"><i class="icon-envelope"></i> Send to Email </a>
                </li>
                {{--<li>
                    <a href="#"> <i class="icon-share-alt"></i> Share </a>
                </li>--}}
            </ul>
        </div>
    </div>
</div>