<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected  $primaryKey ='id';
    protected $guarded= [];


    public function restaurants(){
        return $this->belongsTo(Restaurant::class,'restaurant_id','id');
    }
}
