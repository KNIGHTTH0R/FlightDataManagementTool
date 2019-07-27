@extends('master')
@section('title','Flight Data Management Center')
@section('feature')

<li class="breadcrumb-item"><a href="{{ url('/') }}">Flight Search</a></li>
<li class="breadcrumb-item"> <b>Flight Summary </b></li>
@stop

@section('content')
    <div>
    <form method="post" action="{{url('/summary')}}">
    {{csrf_field()}}
    <div class="form-group">
        Flight type: 
       
        <label class="radio" >
        <label class="radio">    <input type="radio" name="flight_type" value="Arrival" <?php if(isset($flight)){  if($request->get('flight_type')=="Arrival"){ echo("checked"); }  }else{ echo("checked");} ?>>     Arrival   </label>
        <label class="radio">    <input type="radio" name="flight_type" value="Departure" <?php if(isset($flight)){  if($request->get('flight_type')=="Departure"){ echo("checked"); }  } ?>>     Departure  </label>
        </label>
    </div>
    <div class="form-group">
        Group by: 
       
        <label class="radio" >
        <label class="radio">    <input type="radio" name="summary_type" value="Carrier" <?php if(isset($flight)){  if($request->get('summary_type')=="Carrier"){ echo("checked"); }  }else{ echo("checked");} ?>>     Carrier   </label>
        <label class="radio">    <input type="radio" name="summary_type" value="Aircraft_type" <?php if(isset($flight)){  if($request->get('summary_type')=="Aircraft_type"){ echo("checked"); }  } ?>>     Aircraft type  </label>
        <label class="radio">    <input type="radio" name="summary_type" value="Carrier_Aircraft_type" <?php if(isset($flight)){  if($request->get('summary_type')=="Carrier_Aircraft_type"){ echo("checked"); }  } ?>>   Carrier & Aircraft type  </label>
        <label class="radio">    <input type="radio" name="summary_type" value="Weekday_Carrier" <?php if(isset($flight)){  if($request->get('summary_type')=="Weekday_Carrier"){ echo("checked"); }  } ?>>   Weekday & Carrier  </label>
        
        </label>
    </div>
   
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
   
    @if(isset($flight))   
   

    <div style="overflow-x:auto;">
    <table class="table table-bordered table-striped" id="paginated"  > 
    
    
    
   <?php
    if($request->get('summary_type')=="Carrier"){
    
    echo('
    <thead class="thead-inverse">
    <tr>
    <td bgcolor="#A9CCE3"><center><b>Total flights</b></center></td>
    <td bgcolor="#A9CCE3" colspan="7"><center><b>Weekday</b></center></td>
    </tr>
    <tr>
    <td bgcolor="#A9CCE3"><center><b>Carrier</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Sunday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Monday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Tuesday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Wednesday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Thursday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Friday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Saturday</b></center></td>
    
    </tr>
    </thead>
    ');

    foreach ($flight as $t) {
        echo("<tr>");
        echo("<td><center>".$t->carrier."</center></td>");
        echo("<td><center>".$t->sunday."</center></td>");
        echo("<td><center>".$t->monday."</center></td>");
        echo("<td><center>".$t->tuesday."</center></td>");
        echo("<td><center>".$t->wednesday."</center></td>");
        echo("<td><center>".$t->thursday."</center></td>");
        echo("<td><center>".$t->friday."</center></td>");
        echo("<td><center>".$t->saturday."</center></td>");
        echo("</tr>");
            }
    }

    if($request->get('summary_type')=="Aircraft_type"){

    echo('
    <thead class="thead-inverse">
    <tr>
    
    <td bgcolor="#A9CCE3"><center><b>Total flights</b></center></td>
    <td bgcolor="#A9CCE3" colspan="7"><center><b>Weekday</b></center></td>
    </tr>
    <tr>
    <td bgcolor="#A9CCE3"><center><b>Aircraft type</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Sunday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Monday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Tuesday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Wednesday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Thursday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Friday</b></center></td>
    <td bgcolor="#A9CCE3"><center><b>Saturday</b></center></td>
    
    </tr>
    </thead>
    ');

        foreach ($flight as $t) {
            echo("<tr>");
            echo("<td><center>".$t->aircraft_type."</center></td>");
            echo("<td><center>".$t->sunday."</center></td>");
            echo("<td><center>".$t->monday."</center></td>");
            echo("<td><center>".$t->tuesday."</center></td>");
            echo("<td><center>".$t->wednesday."</center></td>");
            echo("<td><center>".$t->thursday."</center></td>");
            echo("<td><center>".$t->friday."</center></td>");
            echo("<td><center>".$t->saturday."</center></td>");
            echo("</tr>");
                }
        }



        if($request->get('summary_type')=="Carrier_Aircraft_type"){

            echo('
            <thead class="thead-inverse">
            <tr>
            
            <td bgcolor="#A9CCE3" colspan="2"><center><b>Total flights</b></center></td>
            <td bgcolor="#A9CCE3" colspan="7"><center><b>Weekday</b></center></td>
            </tr>
            <tr>
            <td bgcolor="#A9CCE3"><center><b>Carrier</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Aircraft type</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Sunday</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Monday</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Tuesday</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Wednesday</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Thursday</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Friday</b></center></td>
            <td bgcolor="#A9CCE3"><center><b>Saturday</b></center></td>
            
            </tr>
            </thead>
            ');
        
                foreach ($flight as $t) {
                    echo("<tr>");
                    echo("<td><center>".$t->carrier."</center></td>");
                    echo("<td><center>".$t->aircraft_type."</center></td>");
                    echo("<td><center>".$t->sunday."</center></td>");
                    echo("<td><center>".$t->monday."</center></td>");
                    echo("<td><center>".$t->tuesday."</center></td>");
                    echo("<td><center>".$t->wednesday."</center></td>");
                    echo("<td><center>".$t->thursday."</center></td>");
                    echo("<td><center>".$t->friday."</center></td>");
                    echo("<td><center>".$t->saturday."</center></td>");
                    echo("</tr>");
                        }
                }

                if($request->get('summary_type')=="Weekday_Carrier"){

                    echo('
                    <thead class="thead-inverse">
                    <tr>
                    
                    <td bgcolor="#A9CCE3" colspan="2"><center><b>Total flights</b></center></td>
                    <td bgcolor="#A9CCE3" colspan="24"><center><b>Hours</b></center></td>
                    </tr>
                    <tr>
                    <td bgcolor="#A9CCE3"><center><b>Weekday</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>Carrier</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>00</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>01</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>02</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>03</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>04</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>05</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>06</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>07</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>08</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>09</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>10</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>11</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>12</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>13</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>14</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>15</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>16</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>17</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>18</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>19</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>20</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>21</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>22</b></center></td>
                    <td bgcolor="#A9CCE3"><center><b>23</b></center></td>
                    </tr>
                    </thead>
                    ');
                
                        foreach ($flight as $t) {
                            echo("<tr>");
                            echo("<td><center>".$t->weekday."</center></td>");
                            echo("<td><center>".$t->carrier."</center></td>");
                            echo("<td><center>".$t->H0."</center></td>");
                            echo("<td><center>".$t->H1."</center></td>");
                            echo("<td><center>".$t->H2."</center></td>");
                            echo("<td><center>".$t->H3."</center></td>");
                            echo("<td><center>".$t->H4."</center></td>");
                            echo("<td><center>".$t->H5."</center></td>");
                            echo("<td><center>".$t->H6."</center></td>");
                            echo("<td><center>".$t->H7."</center></td>");
                            echo("<td><center>".$t->H8."</center></td>");
                            echo("<td><center>".$t->H9."</center></td>");
                            echo("<td><center>".$t->H10."</center></td>");
                            echo("<td><center>".$t->H11."</center></td>");
                            echo("<td><center>".$t->H12."</center></td>");
                            echo("<td><center>".$t->H13."</center></td>");
                            echo("<td><center>".$t->H14."</center></td>");
                            echo("<td><center>".$t->H15."</center></td>");
                            echo("<td><center>".$t->H16."</center></td>");
                            echo("<td><center>".$t->H17."</center></td>");
                            echo("<td><center>".$t->H18."</center></td>");
                            echo("<td><center>".$t->H19."</center></td>");
                            echo("<td><center>".$t->H20."</center></td>");
                            echo("<td><center>".$t->H21."</center></td>");
                            echo("<td><center>".$t->H22."</center></td>");
                            echo("<td><center>".$t->H23."</center></td>");
                                }
                }
        
                

   ?>


   
    
    </table>
    
    </div>



    
    @endif
@stop