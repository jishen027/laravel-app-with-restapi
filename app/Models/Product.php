<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    // if table name is different from model name, use this:
    // protected $table = 'products';

    //primary key
    // public $primaryKey = 'id';

    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'user_id',
    ];

   protected $dates = [
        'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // photo relationship
    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    // tags relationship
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
