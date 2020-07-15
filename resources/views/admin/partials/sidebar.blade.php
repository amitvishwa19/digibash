<aside class="sidenav aside aside-fixed">

  <div class="aside-header">
    <a href="{{route('app.admin.home')}}" class="aside-logo" style="text-align:center">
      <img src="{{asset('public/admin/assets/d-logo.png')}}" alt="d-logo" style="height:25px;">
      digi<span>zigs</span>
    </a>
    <img src="" alt="">
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>

  <div class="aside-body">

    <ul class="nav nav-aside">

      <li class="nav-item">
        <a href="{{route('app.admin.home')}}" class="nav-link">
          <i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-label mg-t-15">APPS</li>
      <li class="nav-item with-sub">
        <a href="" class="nav-link"><i class="fa fa-puzzle-piece"></i> <span>Apps</span></a>
        <ul>
          <li><a href="{{route('app.admin.calendar')}}">Calendar</a></li>
          <li><a href="{{route('mail.index')}}">Mail</a></li>
          <li><a href="">Document</a></li>
        </ul>
      </li>


        <li class="nav-label mg-t-15">CMS</li>
        {{--posts --}}
        <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i>Posts</a>
        </li>
        {{-- Pages --}}
        <li class="nav-item">
            <a href="{{route('page.index')}}" class="nav-link"><i class="fa fa-file" aria-hidden="true"></i>Pages</a>
        </li>
        {{-- Categories --}}
        <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link"><i class="fa fa-bookmark" aria-hidden="true"></i>Categories</a>
        </li>
        {{-- Menus --}}
        <li class="nav-item">
            <a href="{{route('menu.index')}}" class="nav-link"><i class="fa fa-bars" aria-hidden="true"></i>Menus</a>
        </li>
        {{-- Media --}}
        <li class="nav-item">
            <a href="{{route('media.index')}}" class="nav-link"><i class="fa fa-picture-o" aria-hidden="true"></i>Media</a>
        </li>
        {{-- Shops --}}
        <li class="nav-item">
            <a href="{{route('shop.index')}}" class="nav-link"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Shops</a>
        </li>
        {{-- Products --}}
        <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link"><i class="fa fa-product-hunt" aria-hidden="true"></i>Products</a>
        </li>





        {{-- <li class="nav-label mg-t-15">CRM</li>
        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-line-chart" aria-hidden="true"></i> <span>Marketing</span></a>
            <ul>
            <li><a href="page-profile-view.html">Campaigns</a></li>
            <li class="active"><a href="page-connections.html">Leads</a></li>
            <li><a href="page-groups.html">Contacts</a></li>
            <li><a href="page-events.html">Accounts</a></li>
            </ul>
        </li>

        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-crosshairs" aria-hidden="true"></i> <span>Sales</span></a>
            <ul>
            <li><a href="">Deals</a></li>
            <li><a href="page-connections.html">Quotes</a></li>
            <li><a href="page-groups.html">Invoices</a></li>
            <li><a href="page-events.html">Orders</a></li>
            <li><a href="page-events.html">Payments</a></li>
            </ul>
        </li>

        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-thumbs-up" aria-hidden="true"></i> <span>Support</span></a>
            <ul>
            <li><a href="page-profile-view.html">Tickets</a></li>
            <li><a href="page-connections.html">Service Contracts</a></li>
            <li><a href="page-groups.html">Groups</a></li>
            <li><a href="page-events.html">Events</a></li>
            </ul>
        </li>

        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-location-arrow" aria-hidden="true"></i> <span>Inventory</span></a>
            <ul>
            <li><a href="page-profile-view.html">Assets</a></li>
            <li><a href="page-connections.html">Products & Services</a></li>
            <li><a href="page-groups.html">Vendors</a></li>
            </ul>
        </li>

        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span>Social</span></a>
            <ul>
            <li><a href="page-profile-view.html">Facebook</a></li>
            <li><a href="page-profile-view.html">LinkdIn</a></li>
            <li><a href="page-connections.html">Instagram</a></li>
            <li><a href="page-groups.html">Twitter</a></li>
            </ul>
        </li><!--Social--> --}}


        {{menu('admin','admin.partials.menus.admin_sidebar')}}

        <li class="nav-label mg-t-15">System</li>

        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-universal-access" aria-hidden="true"></i> <span>Access Control</span></a>
            <ul>
            <li><a href="{{ route('user.index') }}">User</a></li>
            <li><a href="{{ route('role.index') }}">Roles</a></li>
            <li><a href="{{ route('permission.index') }}">Permissions</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('theme.index')}}" class="nav-link">
            <i class="fa fa-cubes" aria-hidden="true"></i>
            <span>Themes</span>
            </a>
        </li><!--Logs-->



        <li class="nav-item">
            <a href="{{route('app.admin.activity.log')}}" class="nav-link">
            <i class="fa fa-flag" aria-hidden="true"></i>
            <span>Activity Logs</span>
            </a>
        </li><!--Logs-->

        <li class="nav-item">
            <a href="{{route('app.admin.log')}}" class="nav-link">
            <i class="fa fa-bug" aria-hidden="true"></i>
            <span>Error Logs</span>
            </a>
        </li><!--Logs-->

        <li class="nav-item">
            <a href="{{route('setting.index',['type'=>'global'])}}" class="nav-link">
            <i class="fa fa-cogs" aria-hidden="true"></i> <span>Settings</span>
            </a>
        </li><!--Settings-->

    </ul>
  </div>

</aside>
