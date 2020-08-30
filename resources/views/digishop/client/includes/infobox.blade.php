<div class="info-boxes-container" style="background:#fff;margin-top:30px;">
    <div class="container">

        @foreach(posts(['infobox'], 3) as $info)
            <div class="info-box">
            <i class="{{$info->description}}"></i>

            <div class="info-box-content">
                <h4>{{$info->title}}</h4>
                <p>{!!$info->body!!}</p>
            </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->
        @endforeach

        {{-- <div class="info-box">
          <i class="icon-us-dollar"></i>

          <div class="info-box-content">
                <h4>MONEY BACK GUARANTEE</h4>
                <p>100% money back guarantee</p>
          </div><!-- End .info-box-content -->
        </div><!-- End .info-box -->

        <div class="info-box">
          <i class="icon-support"></i>

          <div class="info-box-content">
                <h4>ONLINE SUPPORT 24/7</h4>
                <p>Lorem ipsum dolor sit amet.</p>
          </div><!-- End .info-box-content -->
        </div><!-- End .info-box --> --}}

    </div><!-- End .container -->
</div><!-- End .info-boxes-container -->
