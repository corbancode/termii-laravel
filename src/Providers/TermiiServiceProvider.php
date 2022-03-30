<?php

namespace Corbancode\TermiiLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

use Corbancode\Termii\TermiiFactory;
use Corbancode\Termii\Facades\Termii as TermiiFacade;
use Illuminate\Support\Facades\Http;

class TermiiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__ . '/../Http/helpers.php';

        $this->publishes([
            __DIR__.'/../config/termii.php' => config_path('termii.php'),
        ], 'config');

        $this->createRequestMacro();
    }

    public function createRequestMacro()
    {
        Http::macro('termii', function () {
            return Http::withHeaders([
                'content-type' => 'application/json',
            ])->baseUrl('https://api.ng.termii.com')
            ->timeout(config('termii.request_timeout'))
            ->acceptJson();
        });
    }

    public function register(): void
    {
        $this->registerFacades();
    }

    protected function registerFacades(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('termii', TermiiFacade::class);

        $this->app->singleton('termii', function ($app) {
            return $app->make(TermiiFactory::class);
        });
    }
}