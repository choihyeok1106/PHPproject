{{-- thums-list::class="active" --}}
<li><img src="{{$url}}" data-url="{{$url}}"></li>

{{-- option-list::class="active" --}}
<a href="javascript:void (0);" title="{{$title}}}" data-sku="{{$sku}}">
    <div class="opt-img">
        <img src="{{$image}}">
    </div>
    <div class="price">{{$price}}</div>
</a>

{{-- related-list --}}
<li>
    <div class="card social-card share share-other card-product" data-social="item">
        <div class="card-content">
            <a href="/product/{{$sku}}" class="thumb" data-toggle="res-box">
                <img src="{{$image}}">
            </a>
        </div>
        <a href="/product/{{$sku}}" title="{{$title}}" class="card-header clearfix last">
            <h5>{{$title}}</h5>
        </a>
        <div class="card-price">
            {{$price}}
        </div>
    </div>
</li>