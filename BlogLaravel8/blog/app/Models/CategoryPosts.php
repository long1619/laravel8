<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPosts extends Model
{
    use HasFactory;

    public $timestamp = false;
    protected $fillable = [
        'title', 'desc_short', 'status'
    ];
    protected $privateKey = 'id';
    protected $table = 'category_posts';
}