<?php /** @var \App\Models\PureCommunity[] $communities */ ?>
<div class="general-item-list">
    @foreach($communities as $community)
        <div class="item">
            <div class="item-head">
                <div class="item-details">
                    <img class="item-pic rounded" src="{{$community->photo}}">
                    <a href="#" class="item-name primary-link">{{$community->name}}</a>
                    <span class="item-label">{{$community->created_at}}</span>
                </div>
                <span class="item-status">
                   <span class="text-info">
                       <i class="icon-emoticon-smile"></i> {{$community->likes}}
                   </span>
                    &nbsp;
                   <span class="text-info">
                       <i class="icon-bubbles"></i> {{$community->comments}}
                   </span>
                    &nbsp;
                </span>
            </div>
            <div class="item-body">{{$community->content}}</div>
        </div>
    @endforeach
</div>