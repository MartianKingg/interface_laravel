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

Route::get('users/{p_para}', function ($para) {
    return $para;
});

// route parameter and regular expression
Route::get('/product/{p_name}', function ($name) {
    return $name;
})->where('p_name', '[A-Za-z]+');

Route::get('/no-access', function () {
    echo "You are not access to this page";
    die;
});

Route::get('/login', function () {
    session()->put('user_id', 1);
    return redirect('customer');
});

Route::get('/logout', function () {
    session()->forget('user_id', 1);
    return redirect()->back();
});

// route for displaying data from db using model
Route::get('/customer', function () {
    $customer = Customers::all();

    echo '<pre>';

    print_r($customer->toArray());
});

// group middleware
Route::middleware(['guard','web'])->group(function () {
    //protected

    // Route for customer 
    // Route::get('/customer', [CustomerController::class, 'index'])->middleware('guard');  //for route middleware

    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/customer/add_customer', [CustomerController::class, 'add_customer'])->name('customer.add_customer');
    Route::post('/customer/register', [CustomerController::class, 'register']);
    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
});

Route::get('/loginCred', function () {
    session()->put('user_id', 1);
    return redirect('/dashboard');
});

Route::get('/logoutCred', function () {
    session()->forget('user_id', 1);
    return redirect()->back();
});

Route::get('/data', function(){
    echo '<pre/>';
    print_r(session()->all());
});

// Route::get('/dashboard', function(){
//     echo 'Dashboard';
    
// })->middleware('validate');

Route::middleware(['validate','web'])->group(function(){
    // protected

    Route::get('/data', function(){
        echo '<pre/>';
        print_r(session()->all());
    });
    
    Route::get('/dashboard', function(){
        echo 'Dashboard';
        
    });
});
