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
        <a href="{{route('lms.dashboard')}}" class="nav-link">
          <i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span>
        </a>
      </li>

      <!--------------------------------------------------------------------------------------------------------------------------------------------->

        {{-- Learning management system --}}
        <li class="nav-label mg-t-15">Learning Management</li>
        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-calendar"></i> <span>Attendence</span></a>
            <ul>
              <li><a href="">Teachers Attendence</a></li>
              <li><a href="">Atudent Attendence</a></li>
              <li><a href="">Staff Attendence</a></li>
            </ul>
        </li>
        {{-- Classes --}}
        <li class="nav-item">
            <a href="{{route('section.index')}}" class="nav-link"><i class="fa fa-clone" aria-hidden="true"></i>Sections & Classes</a>
        </li>
        {{-- Course --}}
        <li class="nav-item">
            <a href="{{route('course.index')}}" class="nav-link"><i class="fa fa-book" aria-hidden="true"></i>Course</a>
        </li>
        {{-- Course --}}
        <li class="nav-item">
            <a href="{{route('lesson.index')}}" class="nav-link"><i class="fa fa-book" aria-hidden="true"></i>Lessons</a>
        </li>
        {{-- Students --}}
        <li class="nav-item">
            <a href="{{route('student.index')}}" class="nav-link"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Students</a>
        </li>
        {{-- Teathers --}}
        <li class="nav-item">
            <a href="{{route('teacher.index')}}" class="nav-link"><i class="fa fa-user-secret" aria-hidden="true"></i>Teachers</a>
        </li>
        {{-- Notice --}}
        <li class="nav-item">
            <a href="{{route('teacher.index')}}" class="nav-link"><i class="fa fa-info-circle" aria-hidden="true"></i>Notices</a>
        </li>
        {{-- Event --}}
        <li class="nav-item">
            <a href="{{route('teacher.index')}}" class="nav-link"><i class="fa fa-calendar-o" aria-hidden="true"></i>Events</a>
        </li>

        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-list"></i> <span>Exams & Questions</span></a>
            <ul>
              <li><a href="{{route('exam.index')}}">Exams</a></li>
              <li><a href="{{route('question.index')}}">Questions</a></li>
            </ul>
        </li>


        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-money"></i> <span>Manage Account</span></a>
            <ul>
                <li><a href="">Accountant List</a></li>
                <li><a href="">Add Account Sector</a></li>
                <li><a href="">Add New Income</a></li>
                <li><a href="">Income List</a></li>
                <li><a href="">Add New Expense</a></li>
                <li><a href="">Expense List</a></li>
            </ul>
        </li>

        <li class="nav-item with-sub">
            <a href="" class="nav-link"><i class="fa fa-book"></i> <span>Manage Library</span></a>
            <ul>
                <li><a href="">Librarians</a></li>
                <li><a href="{{route('book.index')}}">Books</a></li>
                <li><a href="{{route('issuedbook.create')}}">Issue Book(s)</a></li>
                <li><a href="{{route('issuedbook.index')}}">Issued Books</a></li>
            </ul>
        </li>

        {{-- Acadmic Settings --}}
        <li class="nav-item">
            <a href="{{route('teacher.index')}}" class="nav-link"><i class="fa fa-cog" aria-hidden="true"></i>Academic Settings</a>
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
            <a href="{{route('theme.index')}}" class="nav-link">
            <i class="fa fa-cubes" aria-hidden="true"></i>
            <span>Themes</span>
            </a>
        </li><!--Logs-->



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
