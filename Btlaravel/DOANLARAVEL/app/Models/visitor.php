<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    use HasFactory;
        public $timestamps=false;
    protected $fillable=['ip_address','date_vistor'];

    protected $primary = 'visitor_id';
    protected $table ='tbl_visitors'; // string, not array


}
