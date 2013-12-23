@extends('admintemplate')

@section('content')

<!-- Messages #1 -->
<div class="widget">
    <div class="whead">
        <h6>Chat Room</h6>
        <div class="on_off">
            <span class="icon-reload-CW"></span>
        </div>            
        <div class="clear"></div>
    </div>
    
    <ul class="messagesOne">
        <li class="by_user">
            <a href="#" title=""><img src="{{ URL::to('/') }}/adminpublic/images/userLogin2.png" alt="" width="36" height="36"/></a>
            <div class="messageArea">
                <span class="aro"></span>
                <div class="infoRow">
                    <span class="name"><strong>John</strong> says:</span>
                    <span class="time">3 hours ago</span>
                    <div class="clear"></div>
                </div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel est enim, vel eleifend felis. Ut volutpat, leo eget euismod scelerisque, eros purus lacinia velit, nec rhoncus mi dui eleifend orci. 
                Phasellus ut sem urna, id congue libero. Nulla eget arcu vel massa suscipit ultricies ac id velit
            </div>
            <div class="clear"></div>
        </li>
    
    
        <li class="by_me">
            <a href="#" title=""><img src="{{ URL::to('/') }}/adminpublic/images/userLogin2.png" alt="" width="36" height="36" /></a>
            <div class="messageArea">
                <span class="aro"></span>
                <div class="infoRow">
                    <span class="name"><strong>Vhyl</strong> says:</span>
                    <span class="time">3 hours ago</span>
                    <div class="clear"></div>
                </div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel est enim, vel eleifend felis. Ut volutpat, leo eget euismod scelerisque, eros purus lacinia velit, nec rhoncus mi dui eleifend orci. 
                Phasellus ut sem urna, id congue libero. Nulla eget arcu vel massa suscipit ultricies ac id velit
            </div>
            <div class="clear"></div>
        </li>
    </ul>
</div>

<!-- Enter message field -->
<div class="enterMessage">
    <input type="text" name="enterMessage" placeholder="Enter your message..." />
    <div class="sendBtn">
        <input type="submit" name="sendMessage" class="buttonS bLightBlue" value="Send" />
    </div>
</div>

@endsection