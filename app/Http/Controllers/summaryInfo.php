<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight_Information;
use Illuminate\Support\Facades\DB;


class summaryInfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('summarypage');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight_type = $request->get('flight_type');
        $summary_type=$request->get('summary_type');
   
        // $query="SELECT carrier, count( case when `weekday` = '0' then weekday end) as sunday, count( case when `weekday` = '1' then weekday end) as monday, count(  case when `weekday` = '2' then weekday end) as tuesday , count( case when `weekday` = '3' then weekday end ) as wednesday , count( case when `weekday` = '4' then weekday end) as thursday , count(  case when `weekday` = '5' then weekday end) as friday , count( case when `weekday` = '6' then weekday end) as saturday FROM(SELECT carrier,strftime('%w', schedule_date) as weekday FROM flight__Information where flight_type='".$flight_type."') group by carrier;";
        // echo $query;

        if($summary_type=="Carrier"){
        $flight = DB::select("SELECT carrier, count( case when `weekday` = '0' then weekday end) as sunday, count( case when `weekday` = '1' then weekday end) as monday, count(  case when `weekday` = '2' then weekday end) as tuesday , count( case when `weekday` = '3' then weekday end ) as wednesday , count( case when `weekday` = '4' then weekday end) as thursday , count(  case when `weekday` = '5' then weekday end) as friday , count( case when `weekday` = '6' then weekday end) as saturday FROM(SELECT carrier,strftime('%w', schedule_date) as weekday FROM flight__Information where flight_type='".$flight_type."') group by carrier ORDER BY carrier;");
        }
       
        if($summary_type=="Aircraft_type"){
            $flight = DB::select("SELECT aircraft_type, count( case when `weekday` = '0' then weekday end) as sunday, count( case when `weekday` = '1' then weekday end) as monday, count(  case when `weekday` = '2' then weekday end) as tuesday , count( case when `weekday` = '3' then weekday end ) as wednesday , count( case when `weekday` = '4' then weekday end) as thursday , count(  case when `weekday` = '5' then weekday end) as friday , count( case when `weekday` = '6' then weekday end) as saturday FROM(SELECT aircraft_type,strftime('%w', schedule_date) as weekday FROM flight__Information where flight_type='".$flight_type."') group by aircraft_type ORDER BY aircraft_type;");
        }

        if($summary_type=="Carrier_Aircraft_type"){
            $flight = DB::select("SELECT carrier, aircraft_type, count( case when `weekday` = '0' then weekday end) as sunday, count( case when `weekday` = '1' then weekday end) as monday, count(  case when `weekday` = '2' then weekday end) as tuesday , count( case when `weekday` = '3' then weekday end ) as wednesday , count( case when `weekday` = '4' then weekday end) as thursday , count(  case when `weekday` = '5' then weekday end) as friday , count( case when `weekday` = '6' then weekday end) as saturday FROM(SELECT carrier, aircraft_type,strftime('%w', schedule_date) as weekday FROM flight__Information where flight_type='".$flight_type."') group by carrier, aircraft_type ORDER BY carrier;");
        }


        if($summary_type=="Weekday_Carrier"){
            $flight = DB::select("SELECT weekday,carrier, count( case when `time` = '0' then weekday end) as H0, count( case when `time` = '1' then weekday end) as H1, count( case when `time` = '2' then weekday end) as H2 , count( case when `time` = '3' then weekday end) as H3 , count( case when `time` = '4' then weekday end) as H4 , count( case when `time` = '5' then weekday end) as H5, count( case when `time` = '6' then weekday end) as H6, count( case when `time` = '7' then weekday end) as H7, count( case when `time` = '8' then weekday end) as H8, count( case when `time` = '9' then weekday end) as H9, count( case when `time` = '10' then weekday end) as H10, count( case when `time` = '11' then weekday end) as H11, count( case when `time` = '12' then weekday end) as H12, count( case when `time` = '13' then weekday end) as H13, count( case when `time` = '14' then weekday end) as H14, count( case when `time` = '15' then weekday end) as H15, count( case when `time` = '16' then weekday end) as H16, count( case when `time` = '17' then weekday end) as H17, count( case when `time` = '18' then weekday end) as H18, count( case when `time` = '19' then weekday end) as H19, count( case when `time` = '20' then weekday end) as H20, count( case when `time` = '21' then weekday end) as H21, count( case when `time` = '22' then weekday end) as H22, count( case when `time` = '23' then weekday end) as H23 FROM (SELECT carrier, case strftime('%w', schedule_date)   when '0' then 'Sunday'   when '1' then 'Monday'   when '2' then 'Tuesday'   when '3' then 'Wednesday'   when '4' then 'Thursday'   when '5' then 'Friday'   else 'Saturday' end as weekday, cast (substr(schedule_date,11,19) as int) as time FROM flight__Information where flight_type='".$flight_type."') group by weekday , carrier ORDER BY weekday ;");
                // print_r($flight);
        }


        return view('summarypage',compact('flight','request'));
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
