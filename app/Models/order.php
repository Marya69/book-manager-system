<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function order()
    // {
    //     return $this->hasMany(order::class, 'prodect_id', 'id');
    // }
    // public function orderDetails()
    // {
    //     return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    // }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'order_id', 'id');
    }
public function orderItems()
{
        return $this->hasMany(OrderDetail::class,'order_id', 'id');
   
}



}