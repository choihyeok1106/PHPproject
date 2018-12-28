<div class="col-md-4 col-lg-3 col-sm-6">
    <div class="portlet light portlet-fit portlet-product">
        <div class="portlet-body padding-0">
            <a href="{{$link}}" class="product-image">
                <img src="{{$image}}" data-sku="{{$sku}}">
            </a>
        </div>
        <div class="portlet-title">
            <div class="caption">
                <a href="{{$link}}" class="caption-subject uppercase">{{$title}}</a>
            </div>
            <div class="m-grid">
                <div class="m-grid-row">
                    <div class="m-grid-col m-grid-col-left">
                        <span class="price">{{$price}}</span>
                        <br>
                        <span class="pv font-grey-cascade">{{$pv}} PV</span>
                    </div>
                    <div class="m-grid-col m-grid-col-right">
                        <button class="btn btn-success add-cart" data-sku="{{$sku}}" type="button">
                            <i class="fa fa-shopping-cart"></i> &nbsp; Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>