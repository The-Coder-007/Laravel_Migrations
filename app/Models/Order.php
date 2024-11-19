<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function party() {
        return $this->belongsTo(Party::class);
    }
    
    
}
