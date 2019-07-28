<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight_Information;

class searchingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $flight=Flight_Information::all()->toArray();

        return view('searchpage');
        // return view('searchpage',compact('flight'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
        $carrier=$request->get('carrier');
        $schedule_date_start=$request->get('schedule-date-start');
        $schedule_date_end=$request->get('schedule-date-end');
        $flight_no=$request->get('flight_no');
        $aircraft_type=$request->get('aircraft_type');
        $select_schedule_date=$request->get('select-schedule-date');
        
       
        
        
        $schedule_date_start=$schedule_date_start." 00:00";
        $schedule_date_end=$schedule_date_end." 23:59";
       
        
    
        $query=Flight_Information::latest()->where('flight_type', 'like', '%' . $flight_type . '%')
        ->where('carrier', 'like', '%' . $carrier . '%')
        ->where('flight_no', 'like', '%' . $flight_no . '%')
        ->where('aircraft_type', 'like', '%' . $aircraft_type . '%');
        
        if(strlen($select_schedule_date)>0){ $query=$query->whereBetween('schedule_date', [$schedule_date_start,$schedule_date_end]); 
    
        
        }
    
        $flight=$query->get();
       


        
        return view('searchpage',compact('flight','request'));
        //send request back to view in order to fill search form's fields. 
        //Each field should contain text as it was before submit button was clicked. 


   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
