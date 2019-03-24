<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->bind(\App\Repository\OnBoard\OnBoardInterface::class, \App\Repository\OnBoard\OnBoardRepository::class);
        $this->app->bind(\App\Repository\Chart\ChartInterface::class, \App\Repository\Chart\WeeklyRetentionChartRepository::class);
    }
}
