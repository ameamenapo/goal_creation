<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

use Illuminate\Support\Collection; //追記。ペジネーションのためにつけたけど、これいらないかも‥。
use Illuminate\Pagination\LengthAwarePaginator; //追記。これもいらないかも‥。LengthAwarePaginatorインスタンス作ってないし。

use Illuminate\Pagination\Paginator;//追記。ペジネーションのため。

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
    public function boot(UrlGenerator $url)
    {
        $url->forceScheme('https');
        
        Paginator::useBootstrap();//追記。ペジネーションをbootstrapで作成するため。
    
        
    }
}
