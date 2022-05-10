





@extends('master')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link href="{{asset('vendor/event/css/custom.css')}}" rel="stylesheet"> 
@if (auth()->user()->role=="2")
<style>

  .panel-body {
background-color: #394C62 !important;
padding: 12px;
box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.fc-view-container {
    background-color: #394C62 !important;
}
.fc-unthemed td.fc-today {
    background: #516072 !important
}
td.fc-day-top>a {
    color: #ffffff !important;
}
.fc-scroller.fc-day-grid-container {
    min-height: 647.156px !important;
}
.fc-row.fc-week.fc-widget-content.fc-rigid {
    min-height: 111px;
}
</style>
@else
    <style>
      .panel-body {
    background-color: #FFFFFF !important;
    padding: 12px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.fc-scroller.fc-day-grid-container {
  min-height: 647.156px !important;
}
.fc-row.fc-week.fc-widget-content.fc-rigid {
    min-height: 111px;
}
    </style>
@endif
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        
        </div>
        <div class="content-body">
          <div class="panel panel-primary">
            <div class="panel-heading text-right my-2">
                <button id="create_event"  type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> New Schedule</button>
            </div>
            <div class="panel-body">
                
                <div id="alert_tmeassage_area"></div>
             
              <div id='calendar'>
              </div>
            </div>
          </div>
          <!--     Create Event  -->        
          <div class="modal fade" id="create_event_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar mr-1" aria-hidden="true"></i>Create Schedule</h4>
                </div>
                <div class="modal-body">
                  <div id="create_event_alert"></div>
                  <form id="create_event_frm"  action="{{route('event')}}"  method="post" enctype="multipart/form-data"  >
                     
                    <div class="row">
                      <div class="col-lg-12 col-xs-12">
                        <div class="form-group">
                          <label class="">Schedule Title</label>
                          <input type="text" name="event_title" id="event_title" required=""  class="form-control" placeholder="Schedule  Title">
                          <input  type="hidden" id="set_start_time_data" value="No" />  
                          <input  type="hidden" id="set_end_time_data" value="No" />  
                          <input  type="hidden" name="set_end_date_data" id="set_end_date_data" value="No" />  
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="pull-left d-flex" style="width: 75%;">
                        <div class="col-lg-5 col-xs-12">
                          <div class="form-group">
                            <label class="">START DATE</label>
                            <input type="text"   name="event_start_date" required="" id="event_start_date" value="" class="form-control date_pick" placeholder="Start Date">
                          </div>
                        </div>
                        <div class="col-lg-2 col-xs-2">
                          <div id="start_time_toggle">
                            <button type="button"  class="btn btn-md"  title="Add Start Time" onclick="add_start_time()" style="display: contents;"> 
                              <i class="text-success fa fa-plus"></i>
                              <i class="text-success fa fa-clock"></i>
                            </button>  
                          </div>
                        </div>
                        <div class="col-lg-5 col-xs-12" id="event_start_time_area" style="display: none">
                          <!--                                 none-->
                          <div class="form-group">
                            <label class="">START TIME</label>
                            <input type="text"   name="event_start_time" id="event_start_time" value="12:00 AM" class="form-control time_pick" placeholder="Start Time">
                          </div>
                        </div>
                      </div>
                      <div class="pull-right d-flex" >
                        <div class="col-lg-12 col-xs-12">
                          <div id="end_date_toggle">
                            <button type="button" class="btn btn-md"  onclick="add_end_date()"  >
                            <i class="text-success fa fa-plus"></i> End Date</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="section row" id="end_date_area" style="display: none">
                      <!--                            none-->
                      <div class="pull-left d-flex" style="width: 75%;">
                        <div class="col-lg-5 col-xs-12">
                          <div class="form-group">
                            <label class="">End DATE</label>
                            <input type="text"   name="event_end_date" id="event_end_date" value="" class="form-control date_pick" placeholder="End Date">
                          </div>
                        </div>
                        <div class="col-lg-2 col-xs-2">
                          <div id="end_time_toggle">
                            <button type="button"  class="btn btn-md" style="display: contents;"  title="Add End Time"  onclick="add_end_time()"> 
                            <i class="text-success fa fa-plus"></i>
                            <i class="text-success fa fa-clock"></i>
                            </button>  
                          </div>
                        </div>
                        <div class="col-lg-5 col-xs-12" id="event_end_time_area" style="display: none">
                          <!--                    //none-->
                          <label class="">END TIME</label>
                          <input type="text"   name="event_end_time" id="event_end_time" value="11:59 PM" class="form-control time_pick" placeholder="End Time">
                        </div>
                      </div>
                      <div class="pull-right">
                        <div class="col-lg-2 col-xs-2">
                          <button type="button" class="btn btn-md" onclick="remove_end_date()"  > <i class="text-danger fa fa-times"></i> Remove</button>
                        </div>
                      </div>
                    </div>
                  
                    <div class="section row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" id="event_description" name="event_description" placeholder="Description" ></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="section" style="margin-top: 10px">
                      <div  class="text-right" id="event_image_error_msg"></div>
                      <p class="text-center">
                          <button type="button" id="create_event_btn"  class="btn btn-primary">Save</button>
                      </p>
                    </div>
                    <!-- end section row -->
                  </form>
                </div>
              </div>
            </div>  
          </div>
          
          
          
          <!--     Edit Event  -->
          <div class="modal fade" id="edit_event_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
              <div class="modal-content admin-form">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar mr-1" aria-hidden="true"></i>Edit Schedule </h4>
                </div>
                <div class="modal-body">
                  <div id="edit_event_alert"></div>
                  <form id="edit_event_frm" action=""  method="post" enctype="multipart/form-data"  >
                    <div class="row">
                      <div class="col-lg-12 col-xs-12">
                        <div class="form-group">
                          <label class="">Schedule Title</label>
                          <input type="text" name="event_title" id="edit_event_title" required=""  class="form-control" placeholder="Schedule  Title">
                        </div>
                        <input type="hidden" id="edit_event_id" value="" name="id" />  
                        <input type="hidden" id="edit_set_start_time_data" value="Yes" />  
                        <input type="hidden" id="edit_set_end_time_data" value="Yes" />  
                        <input type="hidden" name="set_end_date_data" id="edit_set_end_date_data" value="Yes" />  
                      </div>
                    </div>
                    <div class=" row">
                      <div class="pull-left d-flex" style="width: 75%;">
                        <div class="col-lg-5 col-xs-12">
                          <div class="form-group">
                            <label class="">Start Date</label>
                            <input type="text"   name="event_start_date" required="" id="edit_event_start_date" value="" class="form-control date_pick" placeholder="Start Date">
                          </div>
                        </div>
                        <div class="col-lg-2 col-xs-2">
                          <div id="edit_start_time_toggle" class="mt30">
                            <button type="button"  class="btn btn-md" style="display: contents;" title="Remove Start Time"   onclick="edit_remove_start_time()"> 
                            <i class="text-danger fa fa-times"></i>
                            <i class="text-danger fa fa-clock"></i>
                            </button>  
                          </div>
                        </div>
                        <div class="col-lg-5 col-xs-12" id="edit_event_start_time_area" style="display: block">
                          <div class="form-group">
                            <label class="">Start Time</label>
                            <input type="text"   name="event_start_time" id="edit_event_start_time" value="" class="form-control time_pick" placeholder="Start Time">
                          </div>
                        </div>
                      </div>
                      <div class="pull-right d-flex" >
                        <div class="col-lg-12 col-xs-12">
                          <div id="edit_end_date_toggle" class="mt30" style="display: none" >
                            <button type="button" class="btn btn-md"  onclick="edit_add_end_date()"  >
                            <i class="text-success fa fa-plus"></i> End Date</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" id="edit_end_date_area" style="display: block">
                      <div class="pull-left d-flex" >
                        <div class="col-lg-5 col-xs-12">
                          <div class="form-group">
                            <label class="">End Date</label>
                            <input type="text"   name="event_end_date" id="edit_event_end_date" value="" class="form-control date_pick" placeholder="End Date">
                          </div>
                        </div>
                        <div class="col-lg-2 col-xs-2">
                          <div id="edit_end_time_toggle" class="mt30">
                            <button type="button" style="display: contents;"  class="btn btn-md" title="Remove End Time"   onclick="edit_remove_end_time()"> 
                            <i class="text-danger fa fa-times"></i>
                            <i class="text-danger fa fa-clock"></i>
                            </button>  
                          </div>
                        </div>
                        <div class="col-lg-5 col-xs-12" id="edit_event_end_time_area" style="display: block">
                          <div class="form-group">
                            <label class="">End Time</label>
                            <input type="text"   name="event_end_time" id="edit_event_end_time" value="" class="form-control time_pick" placeholder="End Time">
                          </div>
                        </div>
                      </div>
                      <div class="pull-right">
                        <div class="col-lg-2 col-xs-2 mt30" >
                          <button type="button" class="btn btn-md" onclick="edit_remove_end_date()"  > <i class="text-danger fa fa-times"></i> Remove</button>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="">Event Description</label>
                          <textarea class="form-control" id="edit_event_description" name="event_description" placeholder="Description" ></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="section" style="margin-top: 10px">
                      <p class="text-right">
                        <button type="button" id="edit_event_btn"  class="btn btn-primary">Update</button>
                        <a onclick="event.preventDefault();  document.getElementById('deleteevent').submit();" class="btn btn-danger">Delete</a>
                      </p>
                    </div>
                    <!-- end section row -->
                  </form>
                </div>
                <form id="deleteevent" action="{{ route('delete_event') }}" method="POST" class="d-none">
                  @csrf
                  <input type="text" value="" name="id" id="eventid" hidden>
              </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="{{asset('vendor/event/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('vendor/event/js/parsley.js')}}"></script>
<script>
  var loader='<img class="loader" src="<?php echo asset("vendor/event/image/ajax-loader.gif")?>"/>';     
  var calender_data_url = "{{route('all-event')}}";
      
     $( document ).ready(function() {
          
      $(function() {
   $('#calendar').fullCalendar({
      height: 800,
     header: {
         left: 'month,agendaWeek,agendaDay custom1 today,',
         center: 'title',
         right: 'custom2 prevYear,prev,next,nextYear'
       },
       footer: {
         left: 'custom1,custom2',
         center: '',
         right: 'prev,next'
       },  
       defaultDate: moment().format("YYYY-MM-DD"),
        events: window.calender_data_url,
   navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
        axisFormat: 'h:mm',
       timeFormat: 'hh:mm A',	
             editable: true,
             droppable: true,
             eventTextColor:"#5A8DEE",
             eventBorderColor:"#E2ECFF",
             eventColor:"#e7edf3",
             
             eventClick: function (event, jsEvent, view) {
               
              edit_event(event.events_id);
             } 
  
  
   })
 
   });
   });
 
 
   function reloadCalender(mode)
     {
     $('#calendar').fullCalendar( 'removeEvents');
     $('#calendar').fullCalendar( 'addEventSource', calender_data_url);         
      $('#calendar').fullCalendar( 'rerenderEvents' );
   }
 
 
   $("#create_event").click(function(){
 
         $('#create_event_alert').html('');
         $('#create_event_frm').parsley().reset();
         $("#create_event_frm")[0].reset();
       
        
         $('#create_event_modal').modal('show'); 
          
   });
     
     
     
   $('.date_pick').datetimepicker({
               format: 'DD/MM/YYYY',			
                pickTime: false
               
   });
             
   $('.time_pick').datetimepicker({
             pickDate: false
   });      
 
 
 
     function add_start_time(){
         $('#set_start_time_data').val('Yes');
         $('#event_start_time').val('');
         
         var button='<button type="button" title="Remove Start Time" style="display: contents;"   class="btn btn-md"  onclick="remove_start_time()"><i class="text-danger fa fa-times"></i>   <i class="text-danger fa fa-clock"></i> </button>';
         $('#start_time_toggle').html(button);
             $('#event_start_time_area').show();
         
       
     }
 
 
     function remove_start_time(){
         $('#set_start_time_data').val('No');
         
         $('#event_start_time').val('12:00 AM');
         var button='<button type="button" title="Add Start Time" style="display: contents;"  class="btn btn-md"  onclick="add_start_time()"><i class="text-success fa fa-plus"></i>   <i class="text-success fa fa-clock"></i> </button>';
         $('#start_time_toggle').html(button);
           $('#event_start_time_area').hide();
       
     }
 
 
     function add_end_time(){
         $('#set_end_time_data').val('Yes');
         $('#event_end_time').val('');
         
         var button='<button type="button"  title="Remove End Time" style="display: contents;"  class="btn btn-md"  onclick="remove_end_time()"><i class="text-danger fa fa-times"></i>   <i class="text-danger fa fa-clock"></i> </button>';
         $('#end_time_toggle').html(button);
             $('#event_end_time_area').show();
         
       
     }
 
 
     function remove_end_time(){
         $('#set_end_time_data').val('No');
         
         $('#event_end_time').val('11:59 PM');
         var button='<button type="button" title="Add End Time" style="display: contents;"  class="btn btn-md"  onclick="add_end_time()"><i class="text-success fa fa-plus"></i>   <i class="text-success fa fa-clock"></i> </button>';
         $('#end_time_toggle').html(button);
           $('#event_end_time_area').hide();
       
     }
 
       
                                         
 
     function add_end_date(){
         $('#set_end_date_data').val('Yes');
         $('#event_end_time').val('11:59 PM');
         $('#end_date_toggle').hide();
         $('#end_date_area').show();
         
       
     }
 
     
 
     function remove_end_date(){
       
         $('#set_end_date_data').val('No');
         $('#event_end_date').val('');
         $('#event_end_time').val('11:59 PM');
         
         $('#end_date_toggle').show();
         $('#end_date_area').hide();
         
       
     }
     function date_compare(){
         var event_start_date = $('#event_start_date').val().split("/");
           var event_start_time=$('#event_start_time').val();
           var start_data=event_start_date[2]+' '+event_start_date[1]+' '+event_start_date[0]+' '+event_start_time ;
           var start_time = new Date(start_data).getTime();
       
       
           var event_end_date = $('#event_end_date').val().split("/");
           var event_end_time=$('#event_end_time').val();
           var end_data=event_end_date[2]+' '+event_end_date[1]+' '+event_end_date[0]+' '+event_end_time ;
           var end_time = new Date(end_data).getTime();
           $("#create_event_alert").html('');
         
       if($('#set_end_date_data').val()=="Yes"){
         
         if(start_time>end_time){
 
           $('#create_event_alert').show().html('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>End time must be bigger then Start time</div>');   
         return false;
         //   return false;
             
         }else{
             return true; 
         }
       
       }else{
             return true; 
       }
 
 
     }
     $("#create_event_btn").click(function(){
         var set_start_time=$('#set_start_time_data').val();
           if(set_start_time=='Yes'){
             $('#event_start_time').attr('required', 'required');
         }else{
             $('#event_start_time').removeAttr('required');
         }
         
         
         
         
         var set_end_date=$('#set_end_date_data').val();
         if(set_end_date=='Yes'){
             $('#event_end_date').attr('required', 'required');
         }else{
             $('#event_end_date').removeAttr('required');
         }
         
         
         
           var set_end_time=$('#set_end_time_data').val();
           if(set_end_time=='Yes'){
             $('#event_end_time').attr('required', 'required');
         }else{
             $('#event_end_time').removeAttr('required');
         }
         
     
         
         if($('#create_event_frm').parsley().validate()==true  && date_compare()==true ){
           
           //$('#create_event_frm').submit();
         $('#create_event_alert').show().html(loader); 
 
         var action="{{route('event')}}";
         var formData = new FormData($('#create_event_frm')[0]);
          $.ajaxSetup({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });
               $.ajax({
             type: "POST",
             url: action,
             data: formData,
             contentType: false,
             processData: false,
             async: false,
                 success: function(feedback) {
                     
                       var jd = $.parseJSON(feedback);  
                 
                 if(jd.type=='alert-success'){
                   $("#create_event_frm")[0].reset(); 
                   $('#create_event_modal').modal('hide');
                   $('#create_event_alert').show().html('');   
                   
                 
                   $('#alert_tmeassage_area').show().html('<div class="alert '+jd.type+'"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+jd.message+'</div>');     
                   reloadCalender();
                   }else{
                       
                 
                 var msg ='';  
                 
                   $.each(jd.error, function( key, value ){
                       msg +=value+'</br>';  
                       });
             
                 $('#create_event_alert').show().html('<div class="alert '+jd.type+'"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+msg+'</div>');            
                   
                 
               
                 
 
                 } 
                   
                 }
           
               
             });
         
           
           }
     });
 
     function edit_event(event_id){
       
 
           $('#edit_event_modal').modal('show'); 
             $('#edit_event_frm').parsley().reset();
             $("#edit_event_frm")[0].reset();  
             
         $('#edit_event_alert').html(loader); 
         var view_html='';
       
           var single_event_url = "{{url('single-event')}}/"+event_id;
             
         
         $.get(single_event_url, function (r) {
                 var edata = $.parseJSON(r);
           
             
                 
               if(edata.id>0){
         
         
             $('#edit_event_alert').html('');     
       $('#edit_event_id').val(edata.id);
             $('#edit_event_title').val(edata.event_title);
 
       
       $('#edit_event_start_date').val(edata.event_start_date);
       $('#edit_event_start_time').val(edata.event_start_time);
 
             $('#edit_event_end_date').val(edata.event_end_date);
       $('#edit_event_end_time').val(edata.event_end_time);
 
           
       $('#edit_event_description').val(edata.event_description);
       $('#eventid').val(edata.id);
 
         
                 }  
             
                 
       
             }); 
       
     }
 
 
 
 
     function edit_add_start_time(){
         $('#edit_set_start_time_data').val('Yes');
         $('#edit_event_start_time').val('');
         
         var button='<button type="button" title="Remove Start Time" style="display: contents;"   class="btn btn-md"  onclick="edit_remove_start_time()"><i class="text-danger fa fa-times"></i>   <i class="text-danger fa fa-clock"></i> </button>';
         $('#edit_start_time_toggle').html(button);
             $('#edit_event_start_time_area').show();
         
       
     }
 
 
     function edit_remove_start_time(){
         $('#edit_set_start_time_data').val('No');
         
         $('#edit_event_start_time').val('12:00 AM');
         var button='<button type="button"  title="Add Start Time" style="display: contents;"  class="btn btn-md"  onclick="edit_add_start_time()"><i class="text-success fa fa-plus"></i>   <i class="text-success fa fa-clock"></i> </button>';
         $('#edit_start_time_toggle').html(button);
           $('#edit_event_start_time_area').hide();
       
     }
 
 
     function edit_add_end_time(){
         $('#edit_set_end_time_data').val('Yes');
         $('#edit_event_end_time').val('');
         
         var button='<button type="button" title="Remove End Time" style="display: contents;"   class="btn btn-md"  onclick="edit_remove_end_time()"><i class="text-danger fa fa-times"></i>   <i class="text-danger fa fa-clock"></i> </button>';
         $('#edit_end_time_toggle').html(button);
             $('#edit_event_end_time_area').show();
         
       
     }
 
 
     function edit_remove_end_time(){
         $('#edit_set_end_time_data').val('No');
         
         $('#edit_event_end_time').val('11:59 PM');
         var button='<button type="button" title="Add End Time" style="display: contents;" class="btn btn-md"  onclick="edit_add_end_time()"><i class="text-success fa fa-plus"></i>   <i class="text-success fa fa-clock"></i> </button>';
         $('#edit_end_time_toggle').html(button);
           $('#edit_event_end_time_area').hide();
       
     }
 
       
                                         
 
     function edit_add_end_date(){
         $('#edit_set_end_date_data').val('Yes');
         $('#edit_event_end_time').val('11:59 PM');
         
         $('#edit_end_date_toggle').hide();
         $('#edit_end_date_area').show();
         
       
     }
 
 
 
     function edit_remove_end_date(){
       
         $('#edit_set_end_date_data').val('No');
         $('#edit_event_end_date').val('');
         $('#edit_event_end_time').val('11:59 PM');
         
         $('#edit_end_date_toggle').show();
         $('#edit_end_date_area').hide();
         
       
     }
 
 
 
     $("#edit_event_btn").click(function(){
         var set_start_time=$('#edit_set_start_time_data').val();
           if(set_start_time=='Yes'){
             $('#edit_event_start_time').attr('required', 'required');
         }else{
             $('#edit_event_start_time').removeAttr('required');
         }
         
         
         
         
         var set_end_date=$('#edit_set_end_date_data').val();
         if(set_end_date=='Yes'){
             $('#edit_event_end_date').attr('required', 'required');
         }else{
             $('#edit_event_end_date').removeAttr('required');
         }
         
         
         
           var set_end_time=$('#edit_set_end_time_data').val();
           if(set_end_time=='Yes'){
             $('#edit_event_end_time').attr('required', 'required');
         }else{
             $('#edit_event_end_time').removeAttr('required');
         }
         
         
       
     
         
         
         if($('#edit_event_frm').parsley().validate()==true  && edit_date_compare()==true ){
           
           // $('#edit_event_frm').submit();
             $('#edit_event_alert').show().html(loader); 
             var action="{{url('update-event')}}";
             var formData = new FormData($('#edit_event_frm')[0]);
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
                   $.ajax({
                 type: "POST",
                 url: action,
                 data: formData,
                 contentType: false,
                 processData: false,
                 async: false,
                     success: function(feedback) {
                     var jd = $.parseJSON(feedback);  
                     
                     
                     if(jd.type=='alert-success'){
                       $("#edit_event_frm")[0].reset(); 
                       $('#edit_event_modal').modal('hide');
                       $('#edit_event_alert').show().html('');   
                       
                     
                       $('#alert_tmeassage_area').show().html('<div class="alert '+jd.type+'"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+jd.message+'</div>');     
                       reloadCalender();
                       }else{
                           
                     
                     var msg ='';  
                     
                       $.each(jd.error, function( key, value ){
                           msg +=value+'</br>';  
                           });
                 
                     $('#edit_event_alert').show().html('<div class="alert '+jd.type+'"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+msg+'</div>');            
                       
                     
 
                     }
                     }
               
                   
                 });
             
               
               }
     });
 
 
     function edit_date_compare(){
         var event_start_date = $('#edit_event_start_date').val().split("/");
           var event_start_time=$('#edit_event_start_time').val();
           var start_data=event_start_date[2]+' '+event_start_date[1]+' '+event_start_date[0]+' '+event_start_time ;
           var start_time = new Date(start_data).getTime();
       
       
           var event_end_date = $('#edit_event_end_date').val().split("/");
           var event_end_time=$('#edit_event_end_time').val();
           var end_data=event_end_date[2]+' '+event_end_date[1]+' '+event_end_date[0]+' '+event_end_time ;
           var end_time = new Date(end_data).getTime();
           $("#edit_event_alert").html('');
         
       if($('#edit_set_end_date_data').val()=="Yes"){
         
         if(start_time>end_time){
 
 
           $('#edit_event_alert').show().html('<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>End time must be bigger then Start time</div>');            
               
         return false;
         //   return false;
             
         }else{
             return true; 
         }
       
       }else{
             return true; 
       }
 
 
     }
 

</script>
    
@endsection


