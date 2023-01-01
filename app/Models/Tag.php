<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // products relationship
    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }

    // videos relationship
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
