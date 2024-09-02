<?php
namespace App\Providers;
use App\Repository\coursesRepository;
use App\Repository\interface\IcoursesRepository;
use App\Repository\interface\IdepartmentRepository;
use App\Repository\departmentRepository;
use App\Repository\interface\Iuser_coursesRepository;
use App\Repository\interface\IUserRepository;
use App\Repository\user_coursesRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register():void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
        $this->app->singleton(IUserRepository::class,UserRepository::class);
        $this->app->singleton(IdepartmentRepository::class,departmentRepository::class);
        $this->app->singleton(IcoursesRepository::class,coursesRepository::class);
        $this->app->singleton(Iuser_coursesRepository::class,user_coursesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot():void
    {
        //
    }
}
