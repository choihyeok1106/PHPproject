<a href="#map" data-name="{{$name}}">
    <button type="button" class="btn dark btn-outline">{{$name}}
    </button>
</a>

<div class="c-section">
    <h3 id="map_title">{{$title}}</h3>
</div>
<div class="c-section">
    <div class="c-content-label uppercase bg-blue">Address</div>
    <p>{{$address}}</p>
</div>
<div class="c-section">
    <div class="c-content-label uppercase bg-blue">Contacts</div>
    <p>
        <strong>T</strong>
        <span class="map-tel">{{$tel}}</span>
        <br/>
        <strong>F</strong>
        <span class="map-fax">{{$fax}}</span>
    </p>
</div>
<div class="c-section">
    <div class="c-content-label uppercase bg-blue">Social</div>
    <br/>
    <ul class="c-content-iconlist-1">
        <li>
            <a href="{{$twitter}}">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        <li>
            <a href="{{$facebook}}">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li>
            <a href="{{$youtube}}">
                <i class="fa fa-youtube-play"></i>
            </a>
        </li>
        <li>
            <a href="{{$instagram}}">
                <i class="fa fa-instagram"></i>
            </a>
        </li>
        <li>
            <a href="{{$pinterest}}">
                <i class="fa fa-pinterest"></i>
            </a>
        </li>
    </ul>
</div>