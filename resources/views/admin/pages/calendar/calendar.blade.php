
@extends('admin.layout.admin')

@section('title','Calendar')


@section('style')
  <link href="{{asset('public/admin/lib/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('public/admin/css/dashforge.calendar.css')}}">
	

@endsection


@section('content')

<div class="pd-20">
<div class="content-body  " id="contentbody">
    
    <div class="app-calendar">
  
      <div class="calendar-wrapper">
        <div class="calendar-content">
          <div id="calendar" class="calendar-content-body"></div>
        </div><!-- calendar-content -->
      </div><!-- calendar-wrapper -->
  
      <div class="modal calendar-modal-create fade effect-scale" id="modalCreateEvent" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
              <button type="button" class="close pos-absolute t-20 r-20" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
              </button>
  
              <h5 class="tx-18 tx-sm-20 mg-b-20 mg-sm-b-30">Create New Event</h5>
  
              <form id="formCalendar" method="post" action="app-calendar.html">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Add title">
                </div><!-- form-group -->
                <div class="form-group d-flex align-items-center">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadio1">Event</label>
                  </div>
                  <div class="custom-control custom-radio mg-l-20">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadio2">Reminder</label>
                  </div>
                </div><!-- form-group -->
                <div class="form-group mg-t-30">
                  <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Start Date</label>
                  <div class="row row-xs">
                    <div class="col-7">
                      <input id="eventStartDate" type="text" value="" class="form-control" placeholder="Select date">
                    </div><!-- col-7 -->
                    <div class="col-5">
                      <select class="custom-select">
                        <option selected>Select Time</option>
                      </select>
                    </div><!-- col-5 -->
                  </div><!-- row -->
                </div><!-- form-group -->
                <div class="form-group">
                  <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">End Date</label>
                  <div class="row row-xs">
                    <div class="col-7">
                      <input id="eventEndDate" type="text" value="" class="form-control" placeholder="Select date">
                    </div><!-- col-7 -->
                    <div class="col-5">
                      <select class="custom-select">
                        <option selected>Select Time</option>
                      </select>
                    </div><!-- col-5 -->
                  </div><!-- row -->
                </div><!-- form-group -->
                <div class="form-group">
                  <textarea class="form-control" rows="2" placeholder="Write some description (optional)"></textarea>
                </div><!-- form-group -->
              </form>
            </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary mg-r-5">Add Event</button>
              <a href="" class="btn btn-secondary" data-dismiss="modal">Discard</a>
            </div><!-- modal-footer -->
          </div><!-- modal-content -->
        </div><!-- modal-dialog -->
      </div><!-- modal -->
  
      <div class="modal calendar-modal-event fade effect-scale" id="modalCalendarEvent" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="event-title"></h6>
              <nav class="nav nav-modal-event">
                <a href="#" class="nav-link"><i data-feather="external-link"></i></a>
                <a href="#" class="nav-link"><i data-feather="trash-2"></i></a>
                <a href="#" class="nav-link" data-dismiss="modal"><i data-feather="x"></i></a>
              </nav>
            </div><!-- modal-header -->
            <div class="modal-body">
              <div class="row row-sm">
                <div class="col-sm-6">
                  <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Start Date</label>
                  <p class="event-start-date"></p>
                </div>
                <div class="col-sm-6">
                  <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">End Date</label>
                  <p class="event-end-date"></p>
                </div><!-- col-6 -->
              </div><!-- row -->
  
              <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Description</label>
              <p class="event-desc tx-gray-900 mg-b-40"></p>
  
              <a href="" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</a>
            </div><!-- modal-body -->
          </div><!-- modal-content -->
        </div><!-- modal-dialog -->
      </div><!-- modal -->
  
    </div>
  </div>
</div>	

	    
@endsection


@section('modal')

	

@endsection


@section('javascript')
  <script src="{{asset('public/admin/lib/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/fullcalendar/fullcalendar.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/select2/js/select2.full.min.js')}}"></script>

  <script src="{{asset('public/admin/js/calendar-events.js')}}"></script>
  <script src="{{asset('public/admin/js/dashforge.calendar.js')}}"></script>
	
  	<script>
  		$(function(){
        'use strict'

        

        

      })
  	</script>

@endsection