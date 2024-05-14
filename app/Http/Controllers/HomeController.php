<?php

namespace App\Http\Controllers;

use App\Models\Woning;
use App\Models\WoningType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $woningHuis = Woning::all();
        $woning_types = WoningType::all();
        
        return view('welcome', compact('woningHuis', 'woning_types'));

    }
}
