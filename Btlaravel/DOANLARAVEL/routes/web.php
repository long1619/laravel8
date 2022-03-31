<?php

use Illuminate\Support\Facades\Route;
// thêm dòng use
use App\Http\Controllers\homeController;
//admin
use App\Http\Controllers\adminController;


use App\Http\Controllers\categoryProduct;
// thêm thương hiệu sản phẩm
use App\Http\Controllers\BrandProduct;
// thêm sản phẩm
use App\Http\Controllers\ProductController;

//danh mục bài viết
use App\Http\Controllers\category_post;
use App\Http\Controllers\PostController;

// thêm giỏ hàng
use App\Http\Controllers\CardController;
use App\Http\Controllers\checkOutController;
// gửi mail
use App\Http\Controllers\SendMailController;

//delivery
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\GalleryController;
/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

/*

*/

//TRANG ------------------------- USER-----------------------------------
// Route::get('gia-tang-dan/{category_id}',[categoryProduct::class,'gia_tang_dan']);
//layout user
Route::get('home',[homeController::class,'index']);
//tìm kiếm
Route::post('tim-kiem',[homeController::class,'search']);
//---------------------------------------------
//tới trang có phần có form đăng kí đăng nhập
Route::get('login-check-out',[checkOutController::class,'login_check_out']);

// đăng nhập người dùng
Route::post('login-customer',[checkOutController::class,'login_customer']);

// đăng xuất
Route::get('logout-check-out',[checkOutController::class,'logout_check_out']);

// thêm các trường dữ liệu khi đăng kí tài khoản
Route::post('add-customer',[checkOutController::class,'add_customer']);

//form nhập thông tin shipping(thanh toán giỏ hàng)
Route::get('checkout',[checkOutController::class,'checkout']);

//form thanh toán
Route::get('pay-ment',[checkOutController::class,'pay_ment']);

//Đặt Hàng
Route::post('order-place',[checkOutController::class,'order_place']);

//Lưu thông tin from shipping vào csdl
Route::post('save-checkout-customer',[checkOutController::class,'save_checkout_customer']);

//-----------------------------------------------------------------------------------------//
 //tạo trang hiển thị chi tiết sản phẩm trong 1 [Danh Mục] 
Route::get('danh-muc-san-pham/{category_id}',[categoryProduct::class,'show_category_home'])->name('danhmuc.show');
 //tạo trang hiển thị chi tiết sản phẩm trong 1 [thương Hiệu] 
Route::get('thuong-hieu-san-pham/{brand_id}',[BrandProduct::class,'show_brand_home']);

//tạo trang hiển thị chi tiết 1 [Sản Phẩm]
Route::get('chi-tiet-san-pham/{product_id}',[ProductController::class,'show_product']);

//-----------------------------------------------------------------------------//


//----------------lưu sản phẩm vào giỏ hàng -------------------------------------
Route::post('save-cart',[CardController::class,'save_cart'])->name('cart.save');

//------------------ trang giỏ hàng-----------------------------------------------
Route::get('show-cart',[CardController::class,'show_cart']);
// xóa sản phẩm trong phần giỏ hàng
Route::get('/delete-to-cart/{rowId}',[CardController::class,'delete_to_cart']);
// update cái số lượng của 1 sản phẩm trong giỏ hàng
Route::post('update-cart-quantity',[CardController::class,'update_cart_quantity']);

//-------------------//


//TRANG---------------------------ADMIN---------------------------------------------------------//
//đếm

//lọc theo select
Route::post('/dashboad-filter',[adminController::class,'dashboad_filter']);
Route::post('/day-order',[adminController::class,'day_order']);

// lọc theo ngày chọn datepicker
Route::post('/filter-by-date',[adminController::class,'filter_by_date']);
//layout admin
Route::get('/dashboad',[adminController::class,'getShowadnin']);
Route::post('/dashboad',[adminController::class,'postShowadnin']); //get và post phải chung 1 đường dẫn

//login admin
Route::get('/admin',[adminController::class,'getadmin']);
// logout admin
Route::get('/logout',[adminController::class,'getlogout']);
//--------------//

							//-----Các trang quản lí trong phần admin------


//danh mục-----------------------category---------------------------------
Route::get('add-category-product', [categoryProduct::class,'add_category_product']);
Route::get('all-category-product', [categoryProduct::class,'all_category_product']);
/// xóa
Route::get('delete-category-product/{id}', [categoryProduct::class,'delete_category_product1'])->name('category.delete');
// edit 
Route::get('edit_category_product/{id}',[categoryProduct::class,'edit_category_product1'])->name('category.edit');
// cập nhật khi sửa xong
Route::post('update_category_product/{id}',[categoryProduct::class,'update_category_product'])->name('category.update');
//thêm ddanh mục 
Route::post('save_category_product',[categoryProduct::class,'save_category_product']);
Route::get('save_category_product',[categoryProduct::class,'save_category_product']);  

// --------------------------------------------------------------------------//


//danh mục------------------brand(thương hiệu)---------------------------------
Route::get('add-brand-product', [BrandProduct::class,'add_brand_product']); //thêm
Route::get('all-brand-product', [BrandProduct::class,'all_brand_product']); //hiển thị tất cả

//thêm
Route::post('save_brand_product',[BrandProduct::class,'save_brand_product']);
Route::get('save_brand_product',[BrandProduct::class,'save_brand_product']);

/// xóa
Route::get('delete-brand-product/{id}', [BrandProduct::class,'delete_brand_product1'])->name('brand.delete');

// edit 
Route::get('edit_brand_product/{id}',[BrandProduct::class,'edit_brand_product1'])->name('brand.edit');

// cập nhật khi sửa xong
Route::post('update_brand_product/{id}',[BrandProduct::class,'update_brand_product'])->name('brand.update');

//----------------------------------------------------------------------------//


//danh mục-----------------------product(sản phẩm)------------------------------------
Route::get('add-product', [ ProductController::class,'add_product']);
Route::get('all-product', [ ProductController::class,'all_product']);

// thêm 
Route::post('save_product',[ ProductController::class,'save_product']);
Route::get('save_product',[ ProductController::class,'save_product']);

/// xóa
Route::get('delete-product/{id}', [ ProductController::class,'delete_product1'])->name('product.delete');

// edit 
Route::get('edit_product/{id}',[ ProductController::class,'edit_product1'])->name('product.edit');

// cập nhật khi sửa xong --- UPDATE
Route::post('update_product/{id}',[ ProductController::class,'update_product'])->name('product.update');


//-------------------------------GALLERY---------------------------------------------------//
//tới from thêm nhiều ảnh
Route::get('add-gallery/{product_id}',[GalleryController::class,'add_gallery']);
Route::post('select-gallery',[GalleryController::class,'select_gallery']);
//trang thêm ảnh
Route::post('insert-gallery/{pro_id}',[GalleryController::class,'insert_gallery']);
//cập nhật
Route::post('update-gallery',[GalleryController::class,'update_gallery']);
Route::post('delete-gallery',[GalleryController::class,'delete_gallery']);
//update-gallery
Route::post('update-gallery-name',[GalleryController::class,'update_gallery_name']);


//-------------------------------quản lí bài viết---------------------------------------------------//

								//---danh mục------------------
//tới trang thêm bài viết
Route::post('add-category-post',[ category_post::class,'add_category_post']);
Route::get('add-category-post',[ category_post::class,'add_category_post']);

// chức năng thêm bài viết
Route::post('save-category-post',[ category_post::class,'save_category_post']);
//liệt kê tất cả
Route::get('all-category-post', [category_post::class,'all_category_post']);

// sửa bài viết
Route::get('edit-category-post/{id}',[ category_post::class,'edit_category_post']);

// cập nhật khi sửa xong bài viết 
Route::post('update-category-post/{id}',[ category_post::class,'update_category_post']);
/// xóa
Route::get('delete-category-post/{id}', [ category_post::class,'delete_category_post']);

//--------------------------------layout hiển thị--------------------------//
//danh mục của từng bài viết
Route::get('danh-muc-bai-viet/{post_slug}',[category_post::class,'danh_muc_bai_viet']);

			  			 //--bài viết--post--
//hiển thị trang thêm
Route::get('add-post',[PostController::class,'add_post']);
Route::post('add-post',[PostController::class,'add_post']);
//thêm
Route::post('save-post',[PostController::class,'save_post']);
Route::get('save-post',[PostController::class,'save_post']);

//hiển thị tất cả
Route::get('all-post',[PostController::class,'all_post']);
// tới trang sửa
Route::get('edit-post/{id}',[ PostController::class,'edit_post']);

// cập nhật khi sửa xong bài viết 
Route::get('update-post/{id}',[ PostController::class,'update_post']);
Route::post('update-post/{id}',[ PostController::class,'update_post']);

/// xóa
Route::get('delete-post/{post_id}', [ PostController::class,'delete_post']);

//chi tiết của 1 bài viết
Route::get('xembaiviet/{post_slug}', [ PostController::class,'xem_bai_viet']);


//-----------------------------------------------------------------------------------------------------//
						//danh mục quản lí đơn hàng--
// liệt kê tất cả đơn hàng
Route::get('manager-order',[checkOutController::class,'manager_order']);
// nút Xem
Route::get('view-order/{id}',[checkOutController::class,'view_orderid'])->name('order.view');
//--------------------------------------------------------

//-------------------------------------------------
//login FB
Route::get('/login-facebook',[adminController::class,'login_fb']);
Route::get('admin/callback',[adminController::class,'callback_facebook']);
//delivery---------------------
Route::get('/delivery',[DeliveryController::class,'delivery']);
Route::post('/select-delivery',[DeliveryController::class,'select_delivery']);
Route::post('/insert-delivery',[DeliveryController::class,'insert_delivery']);
Route::post('/select-feeship',[DeliveryController::class,'select_feeship']);
Route::post('/update-delivery ',[DeliveryController::class,'update_delivery ']);
// gửi mail-------------------------------------------------------------
Route::get('send-mail',[SendMailController::class,'send_mail']);
Route::get('quenmatkhau',[SendMailController::class,'quen_mat_khau']);
Route::post('recover-pass',[SendMailController::class,'recover_pass']);
//
