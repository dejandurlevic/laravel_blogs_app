<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $table = 'ads';
    protected $fillable = [
        'title', 'body', 'price', 'image1', 'image2', 'image3', 'user_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
