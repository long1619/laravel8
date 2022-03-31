<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistical extends Model
{
    use HasFactory;

        //tự tạo ngày tạo và ngày update = false là k cho chạy
    public $timestamps = false;
    		// có thể làm đầy fillable
   protected  $fillable =

   ['order_date','sales', 'profit','quantity','total_order'];     // đây là các trường trong csdl
    
    protected $primaryKey ='statistical_id'; // khóa chính
    protected $table = 'tbl_statistical';	 //tên table


}
