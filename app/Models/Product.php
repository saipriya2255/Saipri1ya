<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'class','section','address','country','pincode','gender','fathers_name','mothers_name','phonenumber'
    ];

    

}
