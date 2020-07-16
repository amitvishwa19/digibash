@extends('admin.layout.admin')

@section('title','Settings')


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
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
          </ol>
        </nav>
      </div>
    </div>

    @include('admin.partials.alerts')



    <div class="">
      <div><h4>Settings</h4></div>

      <!-- Menu info -->
      <div class="alert alert-primary mg-t-10 mg-b-10" role="alert">
        <b>How To Use:</b>
        <p>
          You can get the value of each setting anywhere on your site by calling
            <b>Setting('key')</b>
        </p>
      </div>
      <!-- Menu info -->

      <div class="row row-md">

        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item {{(request()->type =='global') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'global'])}}">Global Setting</a>
            </li>
            <li class="list-group-item {{(request()->type =='localization') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'localization'])}}">Localization</a>
            </li>
            <li class="list-group-item {{(request()->type =='social') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'social'])}}">Social Authentication</a>
            </li>
            <li class="list-group-item {{(request()->type =='payment') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'payment'])}}">Payment</a>
            </li>
            <li class="list-group-item {{(request()->type =='notification') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'notification'])}}">Push Notification</a>
            </li>
            <li class="list-group-item {{(request()->type =='mail') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'mail'])}}">Mail</a>
            </li>
            <li class="list-group-item {{(request()->type =='translation') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'translation'])}}">Translation</a>
            </li>
            <li class="list-group-item {{(request()->type =='currency') ? 'active' : 'null'}}">
              <a href="{{route('setting.index',['type'=>'currency'])}}">Currencies</a>
            </li>
            <li class="list-group-item {{(request()->type =='oauth') ? 'active' : 'null'}}">
                <a href="{{route('setting.index',['type'=>'oauth'])}}">API Access Token</a>
            </li>
          </ul>
        </div>

        <div class="col-md-9">
          <div class="card ">

            @if(request()->type == 'global')
              @include('admin.pages.setting.global')
            @elseif(request()->type == 'localization')
              @include('admin.pages.setting.localization')
            @elseif(request()->type == 'oauth')
              @include('admin.pages.setting.oauth')
            @endif

          </div>
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
