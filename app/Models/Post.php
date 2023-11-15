<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category_post()
    {
        return $this->belongsToMany(Category::class, 'category_post')->withTimestamps();
    }

    public function statusColor()
    {
        $color = '';

        switch ($this->status) {
            case 'publish':
                $color = 'success';
                break;
            case 'archived':
                $color = 'dark';
                break;
            case 'pending':
                $color = 'danger';
                break;
            default:
                break;
        }

        return $color;
    }
}
