<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // for view
    public function index(){
        return view('customer_reg');
    }

    // for register
    public function register(Request $request){

        // for validation
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'gender' => 'required',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'password_confirm' => 'required | same:password',
        ]);

        //for insert into db

        $customer = new Customers;  //create an object that contains customer model  which include customer table

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->password = $request['password'];
        $customer->points = $request['points'];
        $customer->save();

        return redirect('/customer/view');

    }

    // view customer data
    public function view(){
        $customer = Customers::all();

        $data = compact('customer');

        return view('customer_view')->with($data);
    }

}
