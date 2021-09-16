<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'body',
        'slug',
        'gallery_id',
        'user_id',

    ];




    public function event()
    {
        return $this->belongsToMany(Event::class   );
    }

}
