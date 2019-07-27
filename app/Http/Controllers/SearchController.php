<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    

    function getID($ID){
        return 'show search page'.$ID.'';
        
    }

    function showSearchPage(){
        // return 'show search page';
        return view('searchpage')->with('name','Flight name');
    }
}
