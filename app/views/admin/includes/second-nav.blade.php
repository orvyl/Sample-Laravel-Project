<div class="secNav">
    <div class="secWrapper">
        <div class="secTop">
            <div class="balance sitenamest">
                <div class="balInfo">Site Name:<span><a href="{{ URL::to('/') }}" target="_blank">Group Gifts</a></span></div>
            </div>
            <a href="#" class="triangle-red"></a>
        </div>
        
        <!-- Tabs container -->
        <div id="tab-container" class="tab-container">
            <ul class="iconsLine ic3 etabs">
                <li><a href="#general" title=""><span class="icos-fullscreen"></span></a></li>
                <li><a href="#alt1" title=""><span class="icos-user"></span></a></li>
                <li><a href="#alt2" title=""><span class="icos-archive"></span></a></li>
            </ul>
            
            <div id="general">  
                <ul class="subNav">
                    @yield('subnav')
                    <!-- 
                        <li class="activeli"><a href="ui.html" title="" class="this"><span class="icos-fullscreen"></span>General elements</a></li>
                    <li><a href="ui_icons.html" title=""><span class="icos-images2"></span>Icons</a></li>
                    <li><a href="ui_buttons.html" title=""><span class="icos-coverflow"></span>Button sets</a></li>
                    <li><a href="ui_grid.html" title=""><span class="icos-view"></span>Grid</a></li>
                    <li><a href="ui_custom.html" title=""><span class="icos-cog2"></span>Custom elements</a></li>
                    <li><a href="ui_experimental.html" title="" class="noBorderB"><span class="icos-beta"></span>Experimental</a></li>
                     -->
                </ul>
            </div>
            
            <div id="alt1">
                <div class="divider"><span></span></div>
                <!-- Sidebar chart -->
                <div class="numStats">
                    <ul>
                        <li><a href="#" title="">{{ User::where('usertype','=','admin')->count() }}</a><span>Admin(s)</span></li>
                        <li><a href="#" title="">{{ User::where('usertype','=','admin')->where('online','=',true)->count() }}</a><span>live admin</span></li>
                        <li class="last"><a href="#" title="">{{ User::where('usertype','=','client')->where('online','=',true)->count() }}</a><span>live client</span></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                
                <div class="divider"><span></span></div>
            
            	<!-- Sidebar user list -->
                <ul class="userList">
                    <li>
                        <a href="#" title="">
                            <span class="contactName">
                                <strong>Programmer Mindblow <span>(5)</span></strong>
                                <i>Super Administrator</i>
                            </span>
                            <span class="clear"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="">
                            <span class="contactName">
                                <strong>Mind Programmer<span>(12)</span></strong>
                                <i>Adminstrator</i>
                            </span>
                            <span class="clear"></span>
                        </a>
                    </li>
                </ul>  
            </div>

            <div id="alt2">
                <!-- Search widget with results -->
                @include('admin.includes.notes')
            </div>
            
        </div>
        
        <div class="divider"><span></span></div>
        
        <!-- Sidebar datepicker -->
        <div class="sideWidget">
            <div class="inlinedate"></div>
        </div>
        
        <div class="divider"><span></span></div>
        
   </div> 
   <div class="clear"></div>
</div>