
@extends('admin.layout.admin')

@section('title','Activity Logs')


@section('style')
   <link href="{{asset('public/admin/css/dashforge.profile.css')}}" rel="stylesheet">


@endsection


@section('content')

<div class="content-body " id="contentbody">

   <div class="card">
      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Activity Logs</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="">

         <div class="d-flex mg-b-20">
            <h4>Activity Logs</h4>
         </div>

         <div class="mg-t-20">

            <div class="media d-block d-lg-flex">
               <div class="media-body">
                  <div class="timeline-group tx-13">

                     @if($activities->count() == 0)
                        <div class="alert alert-warning" role="alert"><b>No Activity Log Found</b></div>
                     @else
                        @foreach($activities as $activity)
                           <div class="timeline-item">
                              <div class="timeline-time">{{$activity->created_at->diffForHumans()}}</div>
                              <div class="timeline-body">
                                 <h6 class="mg-b-0">{{ucfirst($activity->description)}} ( {{$activity->subject_type}} )</h6>
                                 <p>
                                    <a href="">{{$activity->causer->firstname}},{{$activity->causer->lastname}}</a>
                                    {{$activity->causer->email}}

                                 </p>
                                 <p></p>

                                 <p> Title </p>

                                 <nav class="nav nav-row mg-t-15">

                                 </nav>
                              </div><!-- timeline-body -->
                           </div><!-- timeline-item -->
                        @endforeach
                     @endif

                  </div><!-- timeline-group -->

               </div><!-- media-body -->

            </div>
         </div>

      </div><!-- row -->
   </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')


  	<script>

  	</script>

@endsection
