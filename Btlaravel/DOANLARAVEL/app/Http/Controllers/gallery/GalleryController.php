<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sesssion;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start;
use Illuminate\Support\CollectionstdClass;
//model;

use App\Models\Gallery;
class GalleryController extends Controller
{
    // tới trang thêm
    public function add_gallery($product_id)
    {		
    	$pro_id =$product_id;

return view("admin.gallery.add_gallery")->with(compact('$pro_id'));                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    }
}
