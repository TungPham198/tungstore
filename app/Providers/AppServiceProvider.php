<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\danhmuc;
use App\banner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this -> app -> bind('path.public', function()
    	{
    		return base_path('public_html');
    	});
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['banner'] = Banner::all();
        $data['dmsp'] = DanhMuc::orderBy('id_danhmuc','desc')->get();
        view()->share($data);
    }
}
