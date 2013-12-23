<div class="mainNav">
    <div class="user">
        <a title="" class="leftUserDrop"><img src="{{ URL::to('/') }}/adminpublic/images/userLogin2.png" alt="" width="74" height="70"/></a><span>Adminsitrator</span>
        <ul class="leftUser">
            <!-- <li><a href="#" title="" class="sSettings">Settings</a></li> -->
            <li><a href="{{ URL::to('admin/bye-now') }}" title="" class="sLogout">Logout</a></li>
        </ul>
    </div>
    
    <!-- Responsive nav -->
    <div class="altNav">
        <div class="userSearch">
            <form action="">
                <input type="text" placeholder="search..." name="userSearch" />
                <input type="submit" value="" />
            </form>
        </div>
        
        <!-- User nav -->
        <ul class="userNav">
            <li><a href="#" title="" class="settings"></a></li>
            <li><a href="{{ URL::to('admin/bye-now') }}" title="" class="logout"></a></li>
        </ul>
    </div>
    
    <!-- Main nav -->
    <ul class="nav">
        <li>
            <a href="{{ URL::to('admin') }}" title="" {{ Request::segment(2) == '' ? 'class="active"':'' }}>
                <img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/dashboard.png" alt="" /><span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/users') }}" title="" {{ Request::segment(2) == 'users' ? 'class="active"':'' }}>
                <img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/ui.png" alt="" /><span>Users</span>
            </a>
            <ul>
                <li><a href="{{ URL::to('admin/users') }}" title=""><span class="icol-list"></span>Client Management</a></li>
                <li><a href="{{ URL::to('admin/users/superusers') }}" title=""><span class="icol-alert"></span>Administrator Accounts</a></li>
                <li><a href="{{ URL::to('admin/users/addsuper') }}" title=""><span class="icol-pencil"></span>Add Adminsitrator</a></li>
            </ul>
        </li>
        <li><a href="{{ URL::to('admin/cms') }}?page=1" title="" {{ Request::segment(2) == 'cms' ? 'class="active"':'' }}><img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/forms.png" alt="" /><span>CMS</span></a>
            <ul>
                <li><a href="{{ URL::to('admin/cms') }}?page=1" title=""><span class="icol-list"></span>About Us</a></li>
            </ul>
        </li>
        <li><a href="{{ URL::to('admin/blog') }}" title="" {{ Request::segment(2) == 'blog' ? 'class="active"':'' }}><img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/forms.png" alt="" /><span>Blog</span></a>
        <li>
            <a href="{{ URL::to('admin/products') }}" title="" {{ Request::segment(2) == 'products' ? 'class="active"':'' }}><img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/tables.png" /><span>Products</span></a>
        </li>
        <li>
            <a href="{{ URL::to('admin/orders') }}" title="" {{ Request::segment(2) == 'orders' ? 'class="active"':'' }}><img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/tables.png" /><span>Orders</span></a>
        </li>
        <li>
            <a href="{{ URL::to('admin/registry') }}" title="" {{ Request::segment(2) == 'registry' ? 'class="active"':'' }}><img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/occasion.png" /><span>Gift Registries</span></a>
        </li>
        <li>
            <a href="{{ URL::to('admin/occasions/manage') }}" title="" {{ Request::segment(2) == 'occasions' ? 'class="active"':'' }}><img src="{{ URL::to('/') }}/adminpublic/images/icons/mainnav/occasion.png" /><span>Occasions</span></a>
        </li>
    </ul>
</div>