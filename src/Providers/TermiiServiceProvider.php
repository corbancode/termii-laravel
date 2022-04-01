<?php

namespace Corbancode\TermiiLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

use Corbancode\TermiiLaravel\TermiiFactory;
use Corbancode\TermiiLaravel\Facades\Termii as TermiiFacade;
use Corbancode\TermiiLaravel\Notifications\TermiiChannel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

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
            ])->baseUrl(config('termii.api_base_url', 'https://api.ng.termii.com'))
            ->timeout(config('termii.request_timeout'))
            ->acceptJson();
        });
    }

    public function register(): void
    {
        $this->registerFacades();

        Notification::resolved(function (ChannelManager $service) {
            $service->extend('termii', function (Application $app) {
                return new TermiiChannel;
            });
        });
    }

    protected function registerFacades(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Termii', TermiiFacade::class);

        $this->app->singleton('termii', function ($app) {
            return $app->make(TermiiFactory::class);
        });
    }
}
