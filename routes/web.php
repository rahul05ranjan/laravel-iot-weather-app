<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Models\Weather;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $model = Weather::all()->last();
    $temp = Weather::whereDay('created_at', now()->day);
    $maxTemp = $temp->max('temperature');
    $minTemp = $temp->min('temperature');
    $averageTemp = $temp->average('temperature');
    return view('welcome', [
        'model' => $model, 
        'maxTemp' => $minTemp, 
        'minTemp' => $maxTemp, 
        'averageTemp' => $averageTemp
    ]);
});

Route::resource('weather', WeatherController::class);