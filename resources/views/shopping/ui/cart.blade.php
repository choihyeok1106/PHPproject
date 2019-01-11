<tr class="product-row" data-sku="{{$sku}}">
    <td class="item-check">{{$checkbox}}</td>
    <td class="text-center">
        <a href="{{$link}}" class="thumbnail">
            <img src="{{$image}}">
        </a>
    </td>
    <td>
        <div class="row">
            <div class="col-md-6 list-name">
                <a href="{{$link}}"><span class="{{$titleclass}}">{{$title}}</span></a>
                <p class="{{$stockclass}}">{{$stockmsg}}</p>
            </div>
            <div class="col-md-2 list-price">
                <p class="price">{{$price}}</p>
            </div>
            <div class="col-md-2 list-val">
                <p class="pv">{{$qv}}</p>
            </div>
            <div class="col-md-2 list-qty">
                {{$qty}}
            </div>
            <div class="list-action">
                <button type="button" class="del" data-sku="{{$sku}}">Delete</button>
            </div>
        </div>
    </td>
</tr>

{{-- <select class="qty" data-sku="{{$sku}}" data-count="{{$qty}}"></select> --}}
{{-- <input type="checkbox" name="item-sku" value="{{$sku}}" checked> --}}


<tr class="product-row" data-sku="{{$sku}}">
    <td class="item-check">{{$checkbox}}</td>
    <td class="text-center">
        <a href="{{$link}}" class="thumbnail">
            <img src="{{$image}}">
        </a>
    </td>
    <td>
        <div class="row">
            <div class="col-md-6 list-name">
                <a href="{{$link}}"><span class="{{$titleclass}}">{{$title}}</span></a>
                <p class="{{$stockclass}}">{{$stockmsg}}</p>
            </div>
            <div class="col-md-4">

                <div class="m-grid">
                    <div class="m-grid-row">
                        <div class="m-grid-col list-price">
                            <p class="price">{{$price}}</p>
                        </div>
                        <div class="m-grid-col list-va">
                            <p class="pv">{{$qv}}</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 list-qty">
                {{$qty}}
            </div>
            <div class="list-action">
                <button type="button" class="del" data-sku="{{$sku}}">Delete</button>
            </div>
        </div>
    </td>
</tr>