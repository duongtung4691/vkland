<?php
// Core service provider not service, 1 service tương đương với 1 repository
namespace App\Providers;

use App\Services\BookService;
use App\Services\BookServiceContract;
use App\Repositories\BookRepository;
use App\Repositories\BookRepositoryContract;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider{

    /**
     * Bootstrap any application services
     * @return void
     */
    public function boot()
    {

    }
    /**
     * Register any application services
     * @return void
     */
    public function register()
    {
        // Luôn luôn inject interface
        $this->app->bind(BookRepositoryContract::class, BookRepository::class);
        $this->app->bind(BookServiceContract::class, BookService::class);
    }
}