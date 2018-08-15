<?php

namespace ILabAfrica\EquipmentInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EquipmentInterface extends Controller
{
    //
    public function receiveTestResults(Request $request){
    	$params = $request->query->all();
    	//var_dump($params);
    	\Log::info($params);
    }
}