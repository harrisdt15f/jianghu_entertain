<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\ErrorsHandler\Reporters\BugsnagReporter;
use App\Lib\ErrorsHandler\Reporters\RollbarReporter;
use App\Lib\ErrorsHandler\Reporters\SentryReporter;

class HarrisErrorHandleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindReporters();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function bindReporters()
    {
        $this->app->bind(BugsnagReporter::class, function ($app) {
            return function (array $config) {
                return new BugsnagReporter($config);
            };
        });

        $this->app->bind(SentryReporter::class, function ($app) {
            return function (array $config) {
                return new SentryReporter($config);
            };
        });

        $this->app->bind(RollbarReporter::class, function ($app) {
            return function (array $config) {
                return new RollbarReporter($config);
            };
        });
    }
}
