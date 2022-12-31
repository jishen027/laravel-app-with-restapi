<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    //product relationship
    public function products()
    {
        return $this->hasManyThrough(Product::class, User::class);
    }
}
