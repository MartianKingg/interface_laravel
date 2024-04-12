<?php

use App\Models\Customers;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/{p_para}', function($para){
    return $para;
});

// route parameter and regular expression
Route::get('/product/{p_name}',function($name){
    return $name;
})->where('p_name','[A-Za-z]+');


// route for displaying data from db using model
Route::get('/customer',function(){
    $customer = Customers::all();

    echo '<pre>';

    print_r($customer->toArray());
});


// Route for customer 
Route::get('/customer',[CustomerController::class, 'index']);
Route::get('/customer/add_customer',[CustomerController::class, 'add_customer'])->name('customer.add_customer');
Route::post('/customer/register',[CustomerController::class, 'register']);
