{{--  @foreach() --}}
<div class="mt-comment">
    <div class="mt-comment-img">
        <img src="{{$image}}">
    </div>
    <div class="mt-comment-body">
        <div class="mt-comment-info">
            <span class="mt-comment-author">{{$title}}</span>
            <span class="mt-comment-date">{{$date}}</span>
        </div>
        <div class="mt-comment-text">{{$content}}</div>
        <div class="mt-comment-details"><a href="/news/{{$id}}">View detail</a></div>
    </div>
</div>
{{--  @endforeach --}}