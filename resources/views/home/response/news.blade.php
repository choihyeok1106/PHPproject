<?php /** @var \App\Repositories\Content[] $news */ ?>
@foreach($news as $content)
    <div class="mt-comment">
        <div class="mt-comment-img"><img
                    src="https://gplivepurecomsite.files.wordpress.com/2018/07/bahamas_whattopack_7_27_18.jpg"></div>
        <div class="mt-comment-body">
            <div class="mt-comment-info">
                <span class="mt-comment-author">{{$content->title}}</span>
                <span class="mt-comment-date">{{$content->created_at}}</span>
            </div>
            <div class="mt-comment-text">{{$content->text}}</div>
            <div class="mt-comment-details"><a href="#">View detail</a></div>
        </div>
    </div>
@endforeach