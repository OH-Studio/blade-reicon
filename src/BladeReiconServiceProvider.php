<?php

declare(strict_types=1);

namespace OHStudio\BladeReicon;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeReiconServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container): void {
            $config = $container->make('config')->get('blade-reicon', []);

            $factory->add('reicon', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-reicon.php', 'blade-reicon');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-reicon'),
            ], 'blade-reicon');

            $this->publishes([
                __DIR__.'/../config/blade-reicon.php' => $this->app->configPath('blade-reicon.php'),
            ], 'blade-reicon-config');
        }
    }
}
