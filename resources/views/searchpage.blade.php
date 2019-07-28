@extends('master')
@section('title','Flight Data Management Center')
@section('feature')
<li class="breadcrumb-item"><b>Flight Search</b></li>
<li class="breadcrumb-item"> <a href="{{ url('/summary') }}">Flight Summary </a></li>
@stop

@section('content')
    <div>
    <form method="post" action="{{url('/')}}">
    {{csrf_field()}}

    <div class="form-group">
        Flight type: 
       
        <label class="radio" >
        <label class="radio">    <input type="radio" name="flight_type" value="Arrival" <?php if(isset($flight)){  if($request->get('flight_type')=="Arrival"){ echo("checked"); }  }else{ echo("checked");} ?>>     Arrival   </label>
        <label class="radio">    <input type="radio" name="flight_type" value="Departure" <?php if(isset($flight)){  if($request->get('flight_type')=="Departure"){ echo("checked"); }  } ?>>     Departure  </label>
        </label>
    </div>

  


    <div class="form-group">
   
  
        <label><input type="checkbox" id="select-schedule-date" name="select-schedule-date"  value="select-schedule-date" <?php if(isset($flight)){  if(strlen($request->get('select-schedule-date'))>0){ echo("checked"); }  } ?>/></label>
        
        Schedule date range: <input type="date" id="schedule-date-start" name="schedule-date-start"         min="2018-01-01" max="2020-12-31" value="<?php if(isset($flight)){  echo($request->get('schedule-date-start')); }else{ echo("2019-02-01");} ?>">
        to <input type="date" id="schedule-date-end" name="schedule-date-end"      min="2018-01-01" max="2020-12-31" value="<?php if(isset($flight)){  echo($request->get('schedule-date-end')); }else{ echo("2019-02-20");} ?>">
    </div>
   
    <div class="form-group">
        Carrier: <input type="text" name="carrier" class="form-control" placehoder="carrier" value="<?php if(isset($flight)){  echo($request->get('carrier')); } ?>">
    </div>

    <div class="form-group">
        Flight no: <input type="text" name="flight_no" class="form-control" placehoder="Flight no" value="<?php if(isset($flight)){  echo($request->get('flight_no')); } ?>">
    </div>
    
    <div class="form-group">
        Aircraft type: <input type="text" name="aircraft_type" class="form-control" placehoder="Aircraft type" value="<?php if(isset($flight)){  echo($request->get('aircraft_type')); } ?>">
    </div>

    <div class="form-group">
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>

    @if(isset($flight))   
   

    <div>
    <table class="table table-bordered table-striped" id="paginated"  > 
    <thead class="thead-inverse">
    <tr>
    <td bgcolor="#A9CCE3"><center><b>Schedule date & time</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Carrier</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Flight no</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Aircraft type</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Gate</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Position</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Additional resources</b></center></td>
    
    </tr>
    </thead>
    @foreach($flight as $row) <tr>
    <td><center>{{$row['schedule_date']}} </center></td>
    <td><center>{{$row['carrier']}} </center></td>
    <td><center>{{$row['flight_no']}} </center></td>
    <td><center>{{$row['aircraft_type']}} </center></td>
    <td><center>{{$row['gate']}} </center></td>
    <td><center>{{$row['pos']}} </center></td>
    <td><center><a onclick="alert('Registration: {{$row['reg']}}\n Belt: {{$row['belt']}}\n Remark: {{$row['reamark']}}')"><font color="#0000A0"> Click </font></a></td>
   
    </tr>
    @endforeach
    </table>
    
    </div>

   


    
    @endif
@stop