<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeship extends Model
{
    use HasFactory;

        //tự tạo ngày tạo và ngày update = false là k cho chạy
    public $timestamps = false;
    		// có thể làm đầy fillable
   protected  $fillable =['fee_matp','fee_maqh','fee_xaid','fee_feeship' ];// đây là các trường trong csdl
    
    protected $primaryKey ='fee_id'; // khóa chính
    protected $table = 'tbl_feeship';	 //tên table

 public function city()
		 {
		 				//thuộc về
		 	return $this->belongsTo('App\Models\city','fee_matp')

		 }

  public function province()
			 {
			 				//thuộc về
			 	return $this->belongsTo('App\Models\provice','fee_maqh')
			 }

 public function wards()
			 {
			 				//thuộc về
			 	return $this->belongsTo('App\Models\wards','fee_Xaid')
			 }

}
