<?php

namespace mihaiomg\WebAlert;


use Illuminate\Support\ServiceProvider;

class WebAlertServiceProvider extends ServiceProvider
{

    protected $apikey;

    public function boot()
    {
        $this->publishes([__DIR__.'/config/webalert.php' => config_path('webalert.php')]);
        $this->apikey = config('webalert.apikey');
    }

    public function register()
    {
        $this->app->singleton('webalert', function(){

            return new WebAlert($this->apikey);
        });
    }
}
