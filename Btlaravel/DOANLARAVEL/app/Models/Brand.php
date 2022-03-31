<?php

namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{  

	use HasFactory;


    //tự tạo ngày tạo và ngày update = false là k cho chạy
    public $timestamps = false;
    		// có thể làm đầy fillable
   protected  $fillable =['brand_name','brand_desc', 'brand_status'  ];// đây là các trường trong csdl
    
    protected $primaryKey ='brand_id'; // khóa chính
    protected $table = 'tbl_brand';	 //tên table




  


}
