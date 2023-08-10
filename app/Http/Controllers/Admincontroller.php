<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use ConsoleTVs\Charts\Facades\Charts;


class AdminController extends Controller
{
    public function Logout(){
    	Auth::logout();//pre define function
    	return Redirect()->route('login');

    }

    
    



}
 