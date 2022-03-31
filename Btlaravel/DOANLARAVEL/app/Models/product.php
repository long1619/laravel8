<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

     public $timestamps=false;
    protected $fillable=[
    'category_id','	product_name','product_quantity','	brand_id','	product_desc','	product_content','	product_price','product_image','product_status'
    ];
    protected $primary = 'product_id';
    protected $table ='tbl_product'; // string, not array

    //ghi mối quan hệ  . 1 sản phẩm nằm trong 1 danh mục
    public function category(){
     return $this->belongsTo(categorypost::class,'category_id');
    }

}
