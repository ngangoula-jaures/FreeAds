<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmpUser extends Model
{

    protected $table = 'tmpusers';

    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

}
