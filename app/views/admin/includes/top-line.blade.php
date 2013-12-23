<div id="top">
    <div class="wrapper">
        <a href="index.html" title="" class="logo">
            <!-- <img src="{{ URL::to('/') }}/adminpublic/images/logo.png" alt="" /> -->
        </a>
        
        <!-- Right top nav -->
        <div class="topNav">
            <ul class="userNav">
                <li><a title="" class="search"></a></li>
                <!-- <li><a href="#" title="" class="settings"></a></li> -->
                <li><a href="{{ URL::to('admin/bye-now') }}" title="" class="logout"></a></li>
                <li class="showTabletP"><a href="#" title="" class="sidebar"></a></li>
            </ul>
            <a title="" class="iButton"></a>
            <a title="" class="iTop"></a>
            <div class="topSearch">
                <div class="topDropArrow"></div>
                <form action="">
                    <input type="text" placeholder="search..." name="topSearch" />
                    <input type="submit" value="" />
                </form>
            </div>
        </div>
        
        <!-- Responsive nav -->
        <ul class="altMenu">
            <li><a href="{{ URL::to('admin') }}" title="">Dashboard</a></li>
            <li><a href="{{ URL::to('admin/users') }}" title="" class="exp" id="current">Users</a>
                <ul>
                    <li><a href="{{ URL::to('admin/users') }}">Manage Clients</a></li>
                    <li><a href="{{ URL::to('admin/users/superusers') }}">Adminstrator Accounts</a></li>
                    <li><a href="{{ URL::to('admin/users/addsuper') }}">Add Admin</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ URL::to('admin/cms?page=1') }}" title="" class="exp">CMS</a>
                <ul>
                    <li><a href="{{ URL::to('admin/cms?page=1') }}">How it works</a></li>
                    <li><a href="{{ URL::to('admin/cms?page=2') }}">About Us</a></li>
                    <li><a href="{{ URL::to('admin/cms?page=3') }}">Privacy Policy</a></li>
                    <li><a href="{{ URL::to('admin/cms?page=4') }}">Terms and Conditions</a></li>
                    <li><a href="{{ URL::to('admin/cms?page=5') }}">Suppliers</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ URL::to('admin/products') }}" title="">Products</a>
                 <ul>
                    <li><a href="{{ URL::to('admin/products/create') }}">Add Product</a></li>
                </ul>
            </li>
            <li><a href="{{ URL::to('admin/occasions') }}" title="">Occasions</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>