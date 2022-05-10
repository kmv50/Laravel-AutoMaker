<?php

namespace AutoMake\Laravel;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use AutoMake\Laravel\TemplateCommand;

class UiServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TemplateCommand::class
            ]);
        }
    }
}
