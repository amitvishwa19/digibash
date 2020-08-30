<aside class="sidenav aside aside-fixed">

    <div class="aside-header">
      <a href="{{route('app.admin.home')}}" class="aside-logo" style="text-align:center">
        <img src="{{setting('app.fevicon')}}" alt="d-logo" style="height:25px;">
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

        <li class="nav-label mg-t-15">E-Commerce</li>
        {{-- Brands --}}
        <li class="nav-item">
            <a href="{{route('brand.index')}}" class="nav-link"><i class="fa fa-at" aria-hidden="true"></i>Brands</a>
        </li>
        {{-- Coupons --}}
        <li class="nav-item">
            <a href="{{route('coupon.index')}}" class="nav-link"><i class="fa fa-money" aria-hidden="true"></i>Coupons</a>
        </li>
        {{-- Shops --}}
        <li class="nav-item">
            <a href="{{route('shop.index')}}" class="nav-link"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Shops</a>
        </li>
        {{-- Products --}}
        <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link"><i class="fa fa-product-hunt" aria-hidden="true"></i>Products</a>
        </li>
        {{-- Order --}}
        <li class="nav-item">
            <a href="{{route('order.index')}}" class="nav-link"><i class="fa fa-usd" aria-hidden="true"></i>Orders</a>
        </li>




          {{menu('admin','admin.partials.menus.admin_sidebar')}}

          <li class="nav-label mg-t-15">System</li>

          <li class="nav-item with-sub">
              <a href="" class="nav-link"><i class="fa fa-universal-access" aria-hidden="true"></i> <span>Access Control</span></a>
              <ul>
              <li><a href="{{ route('user.index') }}">Users</a></li>
              <li><a href="{{ route('role.index') }}">Roles</a></li>
              <li><a href="{{ route('permission.index') }}">Permissions</a></li>
              </ul>
          </li>


          <li class="nav-item">
              <a href="{{route('activity.index')}}" class="nav-link">
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
