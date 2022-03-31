<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'titles', 'short_desc', 'desc', 'image', 'category_post_id', 'date', 'status'
    ];

    protected $privateKey = 'id';
    protected $table = 'posts';

    public function category()
    {
        return $this->belongsTo(CategoryPosts::class, 'category_post_id');
    }
}