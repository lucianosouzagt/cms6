<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Page;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* $this->app->bind('path.public', function(){
            return base_path('public_html');
        }); */
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Menu
        $frontMenu = [];

        $pages = Page::all();

        foreach($pages as $page){
            $frontMenu[ $page['slug'] ] = $page['title'];
        }

        View::share('front_menu',$frontMenu);

        //Configurações

        $config = [];
        $settings = Setting::all();
        foreach($settings as $setting){
            $config[$setting['name']] = $setting['content'];
        }
        View::share('front_config',$config);
    }
}