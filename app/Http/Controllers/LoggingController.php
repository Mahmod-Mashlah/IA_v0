<?php

namespace App\Http\Controllers;

use App\Models\Logging;
use App\Traits\LoggingTrait;
use Illuminate\Http\Request;

class LoggingController extends Controller
{
    use LoggingTrait;
    public function index()
    {
        $loggings = Logging::all();
        return view('loggings',compact(['loggings']));
    }

}
