{{--  @foreach() --}}
<div class="item">
    <div class="item-head">
        <div class="item-details">
            <img class="item-pic rounded" src="{{$image}}">
            <span class="item-name primary-link">{{$name}}</span>
            <span class="item-label">{{$time}}</span>
        </div>
        <span class="item-status">
           <span class="text-info">
               <i class="icon-emoticon-smile"></i> {{$likes}}
           </span>
            &nbsp;
           <span class="text-info">
               <i class="icon-bubbles"></i> {{$comments}}
           </span>
            &nbsp;
        </span>
    </div>
    <div class="item-body">
        {{$content}}
        <div class="link"><a href="{{$link}}">View detail</a></div>
    </div>
</div>
{{--  @endforeach --}}