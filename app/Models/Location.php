<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'ville',
    ];
    
    public function ads() {
        return $this->hasMany(Ad::class); 
    }
    
}
