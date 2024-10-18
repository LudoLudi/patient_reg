<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    protected $fillable = [
        "id",
        "atoll",
        "name",
    ];
}
