<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    public $incrementing = false;
    protected $primaryKey = ['atoll', 'name'];

    protected $fillable = [
        "atoll",
        "name",
    ];
}
