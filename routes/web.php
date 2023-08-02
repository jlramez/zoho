<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/invoices', [App\Http\Controllers\InvoiceController::class, 'index'])->name('index');
Route::view('invoices', 'livewire.invoices.index');
Route::view('persons', 'livewire.persons.index');
Route::get('/bulk', function () {
    $authorization_code='Zoho-oauthtoken 1000.8154a3000a1b2422c83742d1656c9a34.ec0cd2fce3f04a8e67b03d3d3e7a08f5';
    $response = Http::withHeaders([
        'Authorization' => $authorization_code
    ])->get('https://www.zohoapis.com/books/v3/invoices');
    $data=$response->json();
    //$uuid= Str::uuid();
    dd($data);
});
Route::get('/refresh-token', function () {
    //$authorization_code='Zoho-oauthtoken 1000.a8595f03c3d0c7d3cc6aa7866013615c.cb51fe2f29a38ad3848c70929e9ad8c3';
 
    
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://accounts.zoho.com/oauth/v2/token', [
        'form_params' => [
            'refresh_token'=> '1000.5124bbe8bd7bebe92a5c50b4d988d1b4.285719198ff98abb5f490b6675651390',
            'client_id' => '1000.QHEEJEN870F1MGPBAEB7UPBK1GN5AR',
            'client_secret' => '082e4266d03c34c3445eee3234188c5069a14a62b9',
            'grant_type' => 'refresh_token',
        ],
        // If you want more informations during request
        //'debug' => true
    ]);
   /* $response = Http::withBody([
        'Authorization' => $authorization_code,
        'refresh_token' => $refresh_token,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'grant_type' => $grant_type
    ])->post('https://accounts.zoho.com/oauth/v2/token');*/
    $data=$response->getBody()->getContents();
    //$uuid= Str::uuid();
    dd($data);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('params', 'livewire.params.index')->middleware('auth');