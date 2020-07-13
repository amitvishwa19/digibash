
@extends('admin.layout.admin')

@section('title','Dashboard')


@section('style')
	
@endsection


@section('content')
	
<div class="content-body " id="contentbody">
    <div class="card">

      <div class="d-sm-flex align-items-center justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item active" aria-current="page">Website Analytics</li>
            </ol>
          </nav>
        </div> 
      </div>



      <div class="">

        <div class="d-flex mg-b-20">
          <h4>Dashboard</h4>
        </div>

        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Posts</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0.81%</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.2% <i class="icon ion-md-arrow-up"></i></span> than last week</p>
              </div>
              <div class="chart-three">
                  <div id="flotChart3" class="flot-chart ht-30" style="padding: 0px; position: relative;"><canvas class="flot-base" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas><canvas class="flot-overlay" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas></div>
                </div><!-- chart-three -->
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Pages</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">3,137</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.7% <i class="icon ion-md-arrow-down"></i></span> than last week</p>
              </div>
              <div class="chart-three">
                  <div id="flotChart4" class="flot-chart ht-30" style="padding: 0px; position: relative;"><canvas class="flot-base" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas><canvas class="flot-overlay" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas></div>
                </div><!-- chart-three -->
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Avg. Order Value</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">$306.20</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.3% <i class="icon ion-md-arrow-down"></i></span> than last week</p>
              </div>
              <div class="chart-three">
                  <div id="flotChart5" class="flot-chart ht-30" style="padding: 0px; position: relative;"><canvas class="flot-base" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas><canvas class="flot-overlay" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas></div>
                </div><!-- chart-three -->
            </div>
          </div><!-- col -->
          <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
            <div class="card card-body">
              <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Order Quantity</h6>
              <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1,650</h3>
                <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">2.1% <i class="icon ion-md-arrow-up"></i></span> than last week</p>
              </div>
              <div class="chart-three">
                  <div id="flotChart6" class="flot-chart ht-30" style="padding: 0px; position: relative;"><canvas class="flot-base" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas><canvas class="flot-overlay" width="313" height="37" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 250.5px; height: 30px;"></canvas></div>
                </div><!-- chart-three -->
            </div>
          </div>
        </div><!-- col -->
        
      </div>
    </div>
</div>
	    
@endsection


@section('javascript')

  <script>
      $(function(){
        'use strict'

       
        

      })
  </script>
  
@endsection