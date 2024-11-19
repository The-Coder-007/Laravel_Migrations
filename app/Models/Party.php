<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    public function orders() {
        return $this->hasMany(Order::class);
    }
    
    public function employee() {
        return $this->belongsTo(User::class, 'employee_id');
    }
    
}
