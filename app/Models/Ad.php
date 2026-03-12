<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    protected $fillable = [
        'user_id',
        'category_id',
        'location_id',
        'title',
        'description',
        'price',
        'condition',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function photos(){
        return $this->hasMany(AdPhoto::class);
    }



    protected function casts(): array
    {
        return [
            'price' => 'integer',
        ];
    }
}
