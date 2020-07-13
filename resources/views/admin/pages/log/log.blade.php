
@extends('admin.layout.admin')

@section('title','Error Logs')


@section('style')



@endsection


@section('content')

<div class="content-body " id="contentbody">

   <div class="card">
      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Logs</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="">

        <div class="d-flex mg-b-20">
            <h4>Error Logs</h4>
        </div>

        <div class="mg-t-20">
            @if(!$logs)
                <div class="alert alert-warning" role="alert"><b>No Logs found</b></div>
            @else
                <div class="row">
                    <div class="col-2">
                        <ul class="list-group mg-t-10">

                            @if($files)
                                <li class="list-group-item"><b>Log Files</b></li>
                            @endif

                            @foreach($files as $file)
                            <li class="list-group-item @if ($current_file == $file) active @endif">
                                <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}" class="">
                                {{$file}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-10 mg-t-10">

                        @if($logs)
                        <div class="lbl-heading" style="margin-bottom: 10px;">
                            @if($current_file)
                                <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                <span class="fa fa-download mg-r-5"></span> Download file
                                </a>
                                -
                                <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                <span class="fa fa-sync mg-r-5"></span> Clean file
                                </a>
                                -
                                <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                <span class="fa fa-trash mg-r-5"></span> Delete file
                                </a>
                                @if(count($files) > 1)
                                -
                                <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                    <span class="fa fa-trash mg-r-5"></span> Delete all files
                                </a>
                                @endif
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th >Level</th>
                                    <th >Context</th>
                                    <th >Date</th>
                                    <th class="hidden-xs">Content</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $key => $log)
                                    <tr data-display="stack{{{$key}}}" class="even pointer" >

                                        <td class="nowrap text-{{{$log['level_class']}}}" >
                                        <span class="" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                                        </td>
                                        <td class="text"><small>{{$log['context']}}</small></td>
                                        <td class="date"><small>{{{$log['date']}}}</small></td>


                                        <td class="text hidden-xs" width="50%">

                                        <small>{{{$log['text']}}}</small>

                                        @if (isset($log['in_file']))
                                            <br/>{{{$log['in_file']}}}
                                        @endif


                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                    </div>
                </div>
            @endif
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
