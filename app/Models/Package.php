<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(category::class,'cat_id','id');
    }
}
