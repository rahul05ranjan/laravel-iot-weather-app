<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->temperature != 'nan' && $request->humidity != 'nan') {
            $model = new Weather();
            $model->temperature = $request->temperature;
            $model->humidity = $request->humidity;
            if ($model->save()) {
                echo "Saved";
            }else {
                echo "Not saved";
            }
            return;
        }
//         $myfile = fopen(base_path("/report.txt"), "r") or die("Unable to open file!");
        
//         while(!feof($myfile)) {
//             $line = fgets($myfile);
//             $arr = explode(",",$line);
            
//             $temperature = substr($arr[0], strpos($arr[0], "Temperature:") + 12);
//             $humidity = substr($arr[1], strpos($arr[1], "Temperature:") + 9);
//             $time = substr($arr[2], strpos($arr[2], "Temperature:") + 5);
            
//             $model = new Weather();
//             $model->temperature = $temperature;
//             $model->humidity = $humidity;
//             $model->created_at = $time;
//             $model->save();
//         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function show(Weather $weather)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function edit(Weather $weather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weather $weather)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weather $weather)
    {
        //
    }
}
