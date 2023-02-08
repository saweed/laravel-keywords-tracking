<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\DFSRepositoryInterface;
use App\Repositories\DFSRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DFSRepositoryInterface::class, DFSRepository::class);
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
}
