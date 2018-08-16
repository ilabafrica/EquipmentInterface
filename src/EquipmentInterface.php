<?php

namespace ILabAfrica\EquipmentInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use App\Models\Test;
use App\Models\Result;
use App\Models\TestStatus;
use App\Http\Controllers\Controller;

class EquipmentInterface extends Controller
{
    //
    public function store(Request $request){
    	$rules = [
            'measure_id' => 'required',
            'test_type_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator,422);

        } else {
        	Log::info($request);

        	if ($request->input('instrument') === 'sysmexXS-1000i'){
        		$test = Test::find($request->input('test_type_id'));
		        $test->test_status_id = TestStatus::completed;
        		foreach ($test->testType->measures as $measure) {
        			if($measure->measureType->isFreeText()||
                    $measure->measureType->isNumeric()){ 
			            $result = Result::updateOrCreate([
			                'measure_id'=> $request->input('measure_id'),
			                'test_id'	=> $request->input('test_type_id'),
			                'result'	=> $request->input('result'),
			            ]);
			            $result->time_entered = date('Y-m-d H:i:s');
			            $result->save();
        			}else if($measure->measureType->isAlphanumeric()){
        			  	$result = Result::updateOrCreate([
	                        'measure_id'=> $request->input('measure_id'),
	                        'test_id'	=> $request->input('test_type_id'),
	                        'measure_range_id' => $request->input('measure_range_id')
	                    ]);
	                    $result->time_entered = date('Y-m-d H:i:s');
	                    $result->save();
			        }
		        }
		        $test->save();
	        }
        }
    }
}