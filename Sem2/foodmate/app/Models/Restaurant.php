<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $table ='restaurants';
    protected $primaryKey='id';
    protected $guarded=[];

    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function employees(){
        return $this->hasMany(Order::class,'employee_id','id');
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'restaurant_id','id');
    }
    public function products(){
        return $this->hasMany(Product::class,'product_id','id');
    }
}
