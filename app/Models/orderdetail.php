<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderdet()
    {
        return $this->belongsTo(order::class, 'id', 'order_id');
    }
}