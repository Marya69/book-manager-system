<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function muchadan()
    {
        return $this->hasMany(muchdan::class, 'employee_id', 'id');
    }
    
    public function employeexpenses()
    {
        return $this->hasMany(employeeexpenses::class, 'employee_id', 'id');
    }
}
