{{-- <div class="timeline"> --}}
{{--  @foreach() --}}
<li>
    <a href="#0" data-date="{{$date}}" class="border-after-red bg-after-red {{$selected}}">
        {{$goal}}
    </a>
</li>
{{--  @endforeach --}}

{{-- <div class="events-content"> --}}
{{--  @foreach() --}}
<li class="{{$selected}}" data-date="{{$date}}">
    <div class="mt-title">
        <h2 class="mt-content-title">{{$title}}</h2>
    </div>
    <div class="mt-author">
        <div class="mt-author-name">
            <a href="javascript:;" class="font-blue-madison">{{$i}} /7 Completed</a>
        </div>
        <div class="mt-author-datetime font-grey-mint">{{$end}}</div>
    </div>
    <div class="clearfix"></div>
    <div class="mt-content border-grey-steel">
        <p>{{$content}}</p>
        <a href="{{$link}}" class="btn btn-circle btn-outline btn-sm blue">
            View all Courses
        </a>
    </div>
</li>
{{--  @endforeach --}}

