<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    //to match it with table
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';


    // Mutator in laravel: It is used to modify the data that is set to send into the db
    // setNameAttribute():   Name is same as you column name in database but it must be camelcase

    // In case of word like: user_name etc,  use 'setUserNameAttributes()'. Below is example in commented part:
    
    public function setNameAttribute($value){        
        $this->attributes['name'] = ucwords($value);
    }

    // public function setUserNameAttribute($value){        
    //     $this->attributes['user_name'] = ucwords($value);
    // }


    
    // Accessor in Laravel: It is used to modify the data that is already get from the db or during accessing from db
    // getNameAttribute():   Name is same as you column name in database but it must be camelcase

    // In case of word like: user_name etc,  use 'getUserNameAttributes()'. Below is example in commented part:
    

    public function getDobAttribute($value){
        return date("d-M-Y",strtotime($value));
    }
}
