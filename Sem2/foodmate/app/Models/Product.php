<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected  $primaryKey ='id';
    protected $guarded= [];

    public function meals(){
        return $this->belongsTo(Meal::class,'meal_id','id');
    }
    public function restaurants(){
        return $this->belongsTo(Restaurant::class,'restaurant_id','id');
    }
    public function productCategoy(){
        return $this->belongsTo(ProductCategory::class,'product_categories_id','id');
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
}
