<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{
    use HasFactory;

  
    public function setPublishedDateAttribute($value)
    {
        $this->attributes['published_date'] = Carbon::parse($value)->format('Y-m-d');
    }
}
