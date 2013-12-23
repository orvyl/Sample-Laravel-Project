<div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span>{{ $ptitle }}</span>
    <ul class="quickStats">
        <li>
            <a href="" class="blueImg"><img src="{{ URL::to('/') }}/adminpublic/images/icons/quickstats/plus.png" alt="" /></a>
            <div class="floatR"><strong class="blue">{{ Product::count() }}</strong><span>products</span></div>
        </li>
        <li>
            <a href="" class="redImg"><img src="{{ URL::to('/') }}/adminpublic/images/icons/quickstats/user.png" alt="" /></a>
            <div class="floatR"><strong class="blue">{{ User::where('usertype','=','client')->count() }}</strong><span>users</span></div>
        </li>
        <li>
            <a href="" class="greenImg"><img src="{{ URL::to('/') }}/adminpublic/images/icons/quickstats/money.png" alt="" /></a>
            <div class="floatR"><strong class="blue">1289</strong><span>gifts</span></div>
        </li>
    </ul>
    <div class="clear"></div>
</div>