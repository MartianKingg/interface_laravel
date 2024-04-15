<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // for view
    public function index(){
        $customer = Customers::all();

        $data = compact('customer');

        return view('customer_view')->with($data);
    }

    // add customers
    public function add_customer(){
        $url = url('/customer/register');
        $customer = new Customers; //for new customer 
        $title = 'Add Customer';
        $data = compact('url','title','customer');
        return view('customer_reg')->with($data);
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

        return redirect('/customer');

    }

    public function delete($id){
        $customer = Customers::find($id);

        if(!is_null($customer)){
            $customer->delete();
        }

        return redirect('/customer');
    }

    // edit
    public function edit($id){
        $customer = Customers::find($id); // to find for existing particular customers
        
        if(is_null($customer)){
            //No data
        }
        else{
            $url = url('/customer/update') . '/' . $id;
            $title = 'Edit Customer';
            $data = compact('customer','url','title');
            return view('customer_reg')->with($data);
        }
       
    }

    // update
    public function update($id, Request $request){
        $customer = Customers::find($id);

        
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

        return redirect('/customer');
        
    }

    
   

}
