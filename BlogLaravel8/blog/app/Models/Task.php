<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'description',
    ];

    protected $privateKey = 'id';
    protected $table = 'tasks';
}