<aside class="sidenav aside aside-fixed">

  <div class="aside-header">
    <a href="{{route('app.admin.home')}}" class="aside-logo">Laksh<span>digital</span></a>
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
      
      <li class="nav-label mg-t-15">Publish</li>
      <li class="nav-item with-sub">
        <a href="" class="nav-link"><i class="fa fa-puzzle-piece"></i> <span>Publish</span></a>
        <ul>
          <li><a href="{{route('post.index')}}">Posts</a></li>
          <li><a href="page-connections.html">Pages</a></li>
          <li><a href="page-connections.html">Categories</a></li>
        </ul>
      </li>
      

      <li class="nav-label mg-t-15">Apps</li>
      <li class="nav-item">
        <a href="{{route('app.admin.calendar')}}" class="nav-link">
          <i class="fa fa-calendar" aria-hidden="true"></i> <span>Calendar</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('mail.index')}}" class="nav-link">
          <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Mailbox</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="fa fa-tasks" aria-hidden="true"></i> <span>Tasks</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="fa fa-file-text" aria-hidden="true"></i> <span>Documents</span>
        </a>
      </li>
      

      <li class="nav-label mg-t-15">CRM</li>
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
      
      <li class="nav-label mg-t-15">Social</li>
      <li class="nav-item with-sub">
        <a href="" class="nav-link"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span>Social</span></a>
        <ul>
          <li><a href="page-profile-view.html">Facebook</a></li>
          <li><a href="page-profile-view.html">LinkdIn</a></li>
          <li><a href="page-connections.html">Instagram</a></li>
          <li><a href="page-groups.html">Twitter</a></li>
        </ul>
      </li>

      
      <li class="nav-label mg-t-15">System</li>
      <li class="nav-item">
        <a href="{{route('setting.index')}}" class="nav-link">
          <i class="fa fa-cogs" aria-hidden="true"></i> 
          <span>Settings</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('app.admin.log')}}" class="nav-link">
          <i class="fa fa-bug" aria-hidden="true"></i> 
          <span>Logs</span>
        </a>
      </li>
      
      

    </ul>
  </div>

</aside>