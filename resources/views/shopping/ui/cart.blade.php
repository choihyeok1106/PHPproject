<tr class="product-row" data-sku="{{$sku}}">
    <td class="text-center">
        <a href="/product/{{$sku}}" class="thumbnail">
            <img src="{{$image}}">
        </a>
    </td>
    <td>
        <div class="row">
            <div class="col-md-6 list-name">
                <a href="/product/{{$sku}}">{{$title}}</a>
            </div>
            <div class="col-md-2 list-price">
                <p class="price text-danger">{{$price}}</p>
            </div>
            <div class="col-md-2 list-val">
                <p class="pv">{{$pv}} PV</p>
            </div>
            <div class="col-md-2 list-qty">
                <select class="qty" data-sku="{{$sku}}" data-count="{{$qty}}"></select>
            </div>
            <div class="col-md-6 list-action">
                <button type="button" class="del" data-sku="{{$sku}}">Delete</button>
            </div>
        </div>
    </td>
</tr>