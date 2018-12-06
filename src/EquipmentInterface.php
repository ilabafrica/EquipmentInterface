<?php

namespace ILabAfrica\EquipmentInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use ILabAfrica\EquipmentInterface\InstrumentMapping;
use ILabAfrica\EquipmentInterface\InstrumentParameters;
use App\Models\Result;
use App\Models\Test;
use App\Models\TestStatus;
use App\Models\Instrument;
use App\Http\Controllers\Controller;

class EquipmentInterface extends Controller
{   
    public function store(Request $request){
    	
    	/*$rules = [
            'measure_id' => 'required',
            'test_type_id' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator,422);

        } else {*/
        	if ($request->instrument === 'sysmex_xs_1000i'){
                $instrument = Instrument::where('name',$request->instrument)->first();

        		$instrumentmapping = InstrumentMapping::where('instrument_id',$instrument->id)->first();
		        $test_type_id = $instrumentmapping->test_type_id;

                $test = Test::where('identifier', $request->specimen_identifier)->where('test_type_id', $test_type_id)->first();
                        $test->test_status_id = TestStatus::completed;
                        foreach ($test->testType->measures as $measure) {
                            if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                foreach ($request->sub_tests as $sub_test) {
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test['test_id'])->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $sub_test['value'],
                                    ]);
                                    $result->time_entered = date('Y-m-d H:i:s');
                                    $result->save();
                                }
                            }
                        }
		        $test->save();
	        } else if ($request->instrument === 'genexpert'){
                $instrument = Instrument::where('name',$request->instrument)->first();
                $instrumentmapping = InstrumentMapping::where('instrument_id',$instrument->id)->first();
                $test_type_id = $instrumentmapping->test_type_id;

                $test = Test::where('identifier', $request->specimen_identifier)->where('test_type_id', $test_type_id)->first();
                        $test->test_status_id = TestStatus::completed;
                        foreach ($test->testType->measures as $measure) {
                            if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                foreach ($request->sub_tests as $sub_test) {
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test['test_id'])->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $sub_test['value'],
                                    ]);
                                    $result->time_entered = date('Y-m-d H:i:s');
                                    $result->save();
                                }
                            }
                        }
                $test->save();
            } else if ($request->instrument === 'sysmex_poch_100i'){
                $instrument = Instrument::where('name',$request->instrument)->first();
                $instrumentmapping = InstrumentMapping::where('instrument_id',$instrument->id)->first();
                $test_type_id = $instrumentmapping->test_type_id;
                $test = Test::where('identifier', $request->specimen_identifier)->where('test_type_id', $test_type_id)->first();
                        $test->test_status_id = TestStatus::completed;
                        foreach ($test->testType->measures as $measure) {
                            if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                foreach ($request->sub_tests as $sub_test) {
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test['test_id'])->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $sub_test['value'],
                                    ]);
                                    $result->time_entered = date('Y-m-d H:i:s');
                                    $result->save();
                                }
                            }
                        }
                $test->save();
            } else if ($request->instrument === 'humacount_60ts'){
                Log::info($request);
                $instrument = Instrument::where('name',$request->instrument)->first();
                $instrumentmapping = InstrumentMapping::where('instrument_id',$instrument->id)->first();
                $test_type_id = $instrumentmapping->test_type_id;
                $test = Test::where('identifier', $request->specimen_identifier)->where('test_type_id', $test_type_id)->first();
                        $test->test_status_id = TestStatus::completed;
                        foreach ($test->testType->measures as $measure) {
                            if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                foreach ($request->sub_tests as $sub_test) {
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test['test_id'])->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $sub_test['value'],
                                    ]);
                                    $result->time_entered = date('Y-m-d H:i:s');
                                    $result->save();
                                }
                            }
                        }
                $test->save();
            } else if ($request->instrument === 'celltac_f_mek'){
                $instrument = Instrument::where('name',$request->instrument)->first();

                $instrumentmapping = InstrumentMapping::where('instrument_id',$instrument->id)->first();
                $test_type_id = $instrumentmapping->test_type_id;

                $test = Test::where('identifier', $request->specimen_identifier)->where('test_type_id', $test_type_id)->first();
                        $test->test_status_id = TestStatus::completed;
                        foreach ($test->testType->measures as $measure) {
                            if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                foreach ($request->sub_tests as $sub_test) {
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test['test_id'])->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $sub_test['value'],
                                    ]);
                                    $result->time_entered = date('Y-m-d H:i:s');
                                    $result->save();
                                }
                            }
                        }
                $test->save();
            } else if ($request->instrument === 'coulter_act'){
                Log::info($request);
                $instrument = Instrument::where('name',$request->instrument)->first();

                $instrumentmapping = InstrumentMapping::where('instrument_id',$instrument->id)->first();
                $test_type_id = $instrumentmapping->test_type_id;

                $test = Test::where('identifier', $request->specimen_identifier)->where('test_type_id', $test_type_id)->first();
                        $test->test_status_id = TestStatus::completed;
                        foreach ($test->testType->measures as $measure) {
                            if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                foreach ($request->sub_tests as $sub_test) {
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test['test_id'])->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $sub_test['value'],
                                    ]);
                                    $result->time_entered = date('Y-m-d H:i:s');
                                    $result->save();
                                }
                            }
                        }
                $test->save();
            } else if ($request->instrument === 'ilab_aries'){
                Log::info($request);
                $instrument = Instrument::where('name',$request->instrument)->first();

                $instrumentmapping = InstrumentMapping::where('instrument_id',$instrument->id)->first();
                $test_type_id = $instrumentmapping->test_type_id;

                $test = Test::where('identifier', $request->specimen_identifier)->where('test_type_id', $test_type_id)->first();
                        $test->test_status_id = TestStatus::completed;
                        foreach ($test->testType->measures as $measure) {
                            if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                foreach ($request->sub_tests as $sub_test) {
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test['test_id'])->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $sub_test['value'],
                                    ]);
                                    $result->time_entered = date('Y-m-d H:i:s');
                                    $result->save();
                                }
                            }
                        }
                $test->save();
            } else if ($request->instrument === 'humastar_100'){
                function comma_separated_to_array($string, $separator = ','){
                    //Explode on comma
                    $vals = explode($separator, $string);
                 
                    //Trim whitespace
                    foreach($vals as $key => $val) {
                        $vals[$key] = trim($val);
                    }
                    
                    //Return empty array if no items found
                    return array_diff($vals, array(""));
                }

                function get_string_between($string, $start, $end){
                    $string = ' ' . $string;
                    $ini = strpos($string, $start);
                    if ($ini == 0) return '';
                    $ini += strlen($start);
                    $len = strpos($string, $end, $ini) - $ini;
                    return substr($string, $ini, $len);
                }

                $results = str_replace('{', "", $request['results']);
                $results = str_replace('}', "", $results);
                $results = comma_separated_to_array($results);
                
                $instrument = Instrument::where('name',$request->instrument)->first();

                $instrumentmappings = InstrumentMapping::where('instrument_id',$instrument->id)->get();
                
                foreach ($results as $result) {
                    $identifier = substr($result, 0, strpos($result, ":"));
                    $sub_test = get_string_between($result, ':', '=');
                    $value = str_replace('=', "", strstr($result, '='));

                    foreach ($instrumentmappings as $instrumentmapping) {
                        $test_type_id = $instrumentmapping->test_type_id;
                        $test = Test::with('specimen')->whereHas('specimen', function($query) use ($identifier){
                                    $query->where('identifier', $identifier);
                                })->where('test_type_id', $test_type_id)->first();
                        if($test != NULL){
                            $test->test_status_id = TestStatus::completed;
                            
                            foreach ($test->testType->measures as $measure) {
                                if($measure->measureType->isFreeText()||$measure->measureType->isNumeric()){
                                    $instrument_parameters = InstrumentParameters::where('instrument_mapping_id', $instrumentmapping->id)->where('sub_test_id',$sub_test)->first();
                                    $result = Result::updateOrCreate([
                                        'measure_id'=> $instrument_parameters->measure_id,
                                        'test_id'   => $test->id,
                                        'result'    => $value,
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
    }

    public function humastar (Request $request){
        $test = Test::with('encounter', 'encounter.patient', 'testType.measures', 'encounter.location', 'encounter.patient.name', 'specimen')
            ->with('testType')->whereHas('testType', function($query) use ($request){
                    $query->where('name', $request['testtype']);
                }
            )->whereTest_status_id(TestStatus::pending)->where("specimen_id", "!=", NULL)->get();
        return response()->json($test);
    }
}