<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::post('/in', function () {
//    $jsonObject = json_decode(implode('', file("php://input")));
//    $body = json_decode(str_replace('``','"', $jsonObject->message));
//    $from=str_replace('+','',$body->from);
//    $to=$body->to;
//    $message=$body->message;


    $string= "Your verification code: 933087 valid for 2 minutes. For your security, don’t share this verification code with anyone else. If this was not you, please ignore it.لدواعي الأمان، لا تشارك هذا الرمز مع أي شخص آخر. إذا لم تكن أنت، من فضلك تجاهله.لەبەر سكيوریتى خۆت، ئەم کۆدە لەگەڵ هیچ کەسێکی تر شەیر مەکە. ئەگەر ئەمە تۆ نیت، تکایە پشتگوێی بخە.";


    $regex="/code: ([0-9]*)/";
    preg_match($regex,$string,$out);


    print_r($out);
    print_r(file("php://input"));

});
Route::get('/home', function () {
    return view('home');
})->middleware('auth');







Route::get('logout', function () {
    Auth::logout();
    return view('welcome');
});

Auth::routes();


//withdraw money
Route::get('/withdraw', 'withdraw@index')->name('withdraw');
Route::post('/withdraw', 'withdraw@index')->name('withdraw');
Route::get('/withdraw/{id}', 'withdraw@show')->name('withdraw.show');
Route::post('/withdraw/{id}', 'withdraw@process')->name('withdraw.process');

//authcoreController
Route::get('/authcore', 'authcoreController@index')->name('authcoreController');

//donate
Route::get('/donate/{companyID}/', 'donate@index')->name('donate');
Route::post('donate/confirm/{companyID}', 'donate@confirm')->name('donate.Confirm');

//payment
Route::get('/payment/{companyID}/{paymentID}', 'payment@index')->name('payment');
Route::post('/payment/confirm/{companyID}/{paymentID}/{billID}', 'payment@confirm')->name('payment.Confirm');

//admin route
Route::get('/admin/', 'admin@index');
Route::get('/admin/chargeCheck', 'admin@chargeCheck')->name('chrage.check');
Route::get('/admin/chargeCheck/accept/{id}', 'admin@chargeAccept')->name('chrage.accept');
Route::get('/admin/chargeCheck/edit/{id}', 'admin@chargeEdit')->name('chrage.edit');
Route::post('/admin/chargeCheck/edit/{id}', 'admin@chargeEditPost');

Route::get('/admin/chargeCheck/reject/{id}', 'admin@chargeReject')->name('chrage.reject');

//edits
Route::post('/admin/company', 'admin@addCompany')->name('company.add');
Route::get('/admin/company', 'admin@company')->name('company.actions');



//profile route
Route::get('/profile/', 'ProfileController@index');
Route::get('/profile/charge', 'ProfileController@Getcharge');
Route::post('/profile/charge', 'ProfileController@Postcharge');

Route::get('/SendAuthSms/{phonenumber}','authcoreController@SendAuthSms');
Route::get('/authcor','authcoreController@index');
//Route::post('/SetAuthSms/{phonenumber}','authcoreController@SetAuthSms');
Route::get('/getBalance/{token}','authcoreController@getBalances');


