<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;
//quận huyện
    //tự tạo ngày tạo và ngày update = false là k cho chạy
    public $timestamps = false;
    		// có thể làm đầy fillable
   protected  $fillable =['name_quanhuyen','type','matp' ];// đây là các trường trong csdl
    
    protected $primaryKey ='maqh'; // khóa chính
    protected $table = 'tbl_quanhuyen';	 //tên table

}
