<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdPhoto extends Model
{
    protected $fillable = [
        'ad_id',
        'path',
    ];

    public function ads() {
        return $this->belongsTo(Ad::class); 
    }
}
