

@if(Session::has('success'))
  <div id="toasty" class="show success">
    <div id="desc">
      <i class="fa fa-thumbs-up" aria-hidden="true"></i>
      {{ Session::get('success') }}
    </div>
  </div>
@endif

@if(Session::has('info'))
  <div id="toasty" class="show info">
    <div id="desc">
      <i class="fa fa-info" aria-hidden="true"></i>
      {{ Session::get('info') }}
    </div>
  </div>
@endif

@if(Session::has('warning'))
  <div id="toasty" class="show warning">
    <div id="desc">
      <i class="fa fa-exclamation" aria-hidden="true"></i>
      {{ Session::get('warning') }}
    </div>
  </div>
@endif

@if(Session::has('danger'))
  <div id="toasty" class="show danger">
    <div id="desc">
      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
      {{ Session::get('danger') }}
    </div>
  </div>
@endif

@if($errors->any())
  <div id="toasty" class="show danger">
    <div id="desc">
      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
      @foreach($errors->all() as $error)
        <ul>
          <li>{{$error}}</li>
        </ul>
      @endforeach
    </div>
  </div>
@endif
