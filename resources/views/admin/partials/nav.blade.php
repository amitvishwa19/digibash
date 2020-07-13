<div class="content-header navbar navbar-header">
   
   

   <div class="navbar-right pull-right">

      <div class="dropdown dropdown-notification">

         <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
           <i class="fa fa-comments-o" aria-hidden="true"></i>
           <span>5</span>
         </a>

         <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header">New Messages</div>

            <a href="" class="dropdown-item">
               <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <strong>Socrates Itumay</strong>
                    <p>nam libero tempore cum so...</p>
                    <span>Mar 15 12:32pm</span>
                  </div><!-- media-body -->
               </div><!-- media -->
            </a>

            <a href="" class="dropdown-item">
               <div class="media">
               <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
               <div class="media-body mg-l-15">
                 <strong>Joyce Chua</strong>
                 <p>on the other hand we denounce...</p>
                 <span>Mar 13 04:16am</span>
               </div><!-- media-body -->
               </div><!-- media -->
            </a>

            <a href="" class="dropdown-item">
               <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <strong>Althea Cabardo</strong>
                    <p>is there anyone who loves...</p>
                    <span>Mar 13 02:56am</span>
                  </div><!-- media-body -->
               </div><!-- media -->
            </a>

            <a href="" class="dropdown-item">
               <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <strong>Adrian Monino</strong>
                    <p>duis aute irure dolor in repre...</p>
                    <span>Mar 12 10:40pm</span>
                  </div><!-- media-body -->
               </div><!-- media -->
            </a>

            <div class="dropdown-footer"><a href="">View all Messages</a></div>
         </div><!-- dropdown-menu -->
      </div><!-- dropdown -->

      <div class="dropdown dropdown-notification">
         <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
              <i class="fa fa-bell-o" aria-hidden="true"></i>
              <span>2</span>
         </a>
         <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header">Notifications</div>
            <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                    <span>Mar 15 12:32pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
            </a>

            <a href="" class="dropdown-item">
               <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p><strong>Joyce Chua</strong> just created a new blog post</p>
                    <span>Mar 13 04:16am</span>
                  </div><!-- media-body -->
               </div><!-- media -->
            </a>

            <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                    <span>Mar 13 02:56am</span>
                  </div><!-- media-body -->
                </div><!-- media -->
            </a>

            <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                    <span>Mar 12 10:40pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
            </a>
              <div class="dropdown-footer"><a href="">View all Notifications</a></div>
         </div><!-- dropdown-menu -->
      </div><!-- dropdown -->

      <div class="dropdown dropdown-profile">

         <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
           <div class="avatar avatar-sm"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
         </a><!-- dropdown-link -->

         <div class="dropdown-menu dropdown-menu-right tx-13">
            <div class="avatar avatar-lg mg-b-15"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
            <h6 class="tx-semibold">{{Auth::user()->firstname}},{{Auth::user()->lastname}}</h6>
            {{Auth::user()->email}}
            <div class="mg-b-15">
               <span class="mg-b-10 tx-12 tx-color-03">
                  @foreach(Auth::user()->roles as $rl)
                     <div class="badge badge-info mr-1" >{{$rl->name}}</div>
                  @endforeach
               </span>
            </div>

            <a href="{{route('profile.index')}}" class="dropdown-item">
               <i class="fa fa-user" aria-hidden="true"></i> My Profile
            </a>
     
            <a href="{{route('account.index')}}" class="dropdown-item">
               <i class="fa fa-cog" aria-hidden="true"></i> Account Settings
            </a>

         

            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">
               <i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out
            </a>
            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
            </form>

         </div><!-- dropdown-menu -->
      </div><!-- dropdown -->


   </div><!-- navbar-right -->
</div><!-- content-header -->