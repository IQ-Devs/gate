<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//we will use this route to upload all sms with any provider we have (phone, simbank , gatebank)
// Route::post('/UploadSms', 'SmsServerController@upload');
// Route::post('/in', function (Request $jsonObject) {
//     $body = json_decode(str_replace('``','"', $jsonObject->message));
// //    $from=str_replace('+','',$body->from);
//     $message=$body->message;

//     $regex="/code: ([0-9]*)/";
//     preg_match($regex,$message,$code);


//     print_r($code[1]);
// //    dd(file_get_contents("php://input"));

// });

Route::post('/SetAuthSms/','authcoreController@SetAuthSms');

