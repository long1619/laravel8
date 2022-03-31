<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postTB extends Model
{ 
    use HasFactory;
     public $timestamps=false;
    protected $fillable=['post_title','post_slug','post_desc','post_content','	post_meta_desc','	post_meta_keyword','post_status','post_image','cate_post_id'];
    protected $primary = 'post_id';
    protected $table ='tbl_posts'; // string, not array


    public function cate_post()
    {
    	//belongto-- thuộc 1 danh mục
    	// return $this->belongsTo(' App\Models\categorypost','cate_post_id');

            return $this->belongsTo(categorypost::class,'cate_post_id');
    }
  
} 
 