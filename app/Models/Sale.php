<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    //protected $fillable=['product_category_id','product_id','quantity','rate', 'amount','date','customername'];
    protected $guarded = [];
}
