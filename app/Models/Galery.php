<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galery extends Model
{
    use HasFactory;
    protected $table = 'gallery_images';

    // Define a scope for retrieving random records
    public function scopeRandom($query)
    {
        return $query->inRandomOrder()->limit(3);
    }
}
