<?php

namespace App\Providers;
use DB;
use App\Models\postTB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
// truyền biến cục bộ cho toàn vỉew
    // là gửi mã code cho toàn view
    public function boot()
    {
        view()->composer('*',function($view){

                 // Schema::defaultStringLength(191);
              // đếm - để hiển thị lên biểu đồ tròn
        $count_product=DB::table('tbl_product')->count();
        $count_customer=DB::table('tbl_customer')->count();
        $count_order=DB::table('tbl_order')->count();

        $count_post =postTB::all()->count();
       $view->with(compact('count_product','count_customer','count_order','count_post'));


        });
  
    }
}
