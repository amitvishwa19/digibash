<?php

//$fullname = Auth::user()->name;
//$image = Auth::user()->profile->avatar_url;

?>

<div class="top_nav">
  <div class="nav_menu">
    <nav>

      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>


      <ul class="nav navbar-nav navbar-right">

        <li class="user" >
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::user()->avatar_url }}" alt=""> {{Auth::user()->name }}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="{{route('profile.index')}}"><i class="fa fa-user" aria-hidden="true"></i><span> Profile</span></a></li>
            <li>
              <a href="{{route('settings.index')}}">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Settings</span>
              </a>
            </li>
            
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="fa fa-sign-out"></i> <span>Log Out</span></a>

              <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>

            </li>
          </ul>
        </li>

         <li role="presentation" class="dropdown">

            @if(Auth::user()->unreadNotifications->count())  
               <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                 <i class="fa fa-bell"></i>
                     <span class="badge bg-green">{{Auth::user()->unreadNotifications->count()}}</span>
               </a>
            @endif

            <ul id="menu1" class="dropdown-menu list-unstyled msg_list to_do" role="menu">
               @foreach(Auth::user()->unreadNotifications()->paginate(5) as $notification)
                  <li>
                     <div>
                       <span><b>{{$notification->data['notify']['title']}}</b></span>
                        <span class="time pull-right">{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>  
                     </div>

                     <div class="message" style="margin-bottom: 25px;">
                       {{$notification->data['notify']['body']}}
                     </div>
                  
                   
                  </li>
               @endforeach
            </ul>
         </li>

      </ul>
    </nav>
  </div>
</div>