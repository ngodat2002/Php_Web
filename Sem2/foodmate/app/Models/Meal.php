<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $table = 'meals';
    protected  $primaryKey ='id';
    protected $guarded= [];

    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
