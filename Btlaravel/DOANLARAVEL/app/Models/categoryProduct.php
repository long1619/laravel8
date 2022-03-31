<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryProduct extends Model
{
    use HasFactory;

     public $timestamps=false;
    protected $fillable=[
    	'category_name','category_desc','category_status'
    ];
    protected $primary = 'category_id';
    protected $table ='tbl_category_product'; 

    // mối quan hệ -1 danh mục có nhiều sp
    public function product(){
   
    	     return $this->hasMany(product::class,'product_id');
    }

}
