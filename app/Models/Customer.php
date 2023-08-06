<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $primaryKey='customer_id';

    // protected $fillable = [
    //     'name', 'email', 'password', 'password_confirmation', 'gender', 'address', 'country', 'dob'
    //     ];

        protected $fillable=[ 'name', 'email', 'password', 'confirm_password', 'gender', 'address', 'country', 'dob'
    ];
    public function setNameAttribute($value){
        $this->attributes['name']=ucwords($value);
    }
    public function getDobAttribute($value){
        return date('d-M-y',strtotime($value));
    }
}
