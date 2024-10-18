<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        "id",
        "num",
        "apartment",
        "street",
        "island_id",
    ];

    public function island()
    {
        return $this->belongsTo(Island::class);
    }
}
