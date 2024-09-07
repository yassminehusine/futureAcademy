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
use App\Repository\interface\ImaterialRepository;
use App\Repository\assignmentRepository;
use App\Repository\interface\IassignmentRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\materialRepository;
use App\Repository\interface\IpostRepository;
use App\Repository\postRepository;
use App\Repository\interface\IsubmissionRepository;
use App\Repository\submissionRepository;
use App\Repository\frontRepository;
use App\Repository\interface\IfrontRepository;


class AppServiceProvider extends ServiceProvider{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
        $this->app->singleton(IUserRepository::class,UserRepository::class);
        $this->app->singleton(IdepartmentRepository::class,departmentRepository::class);
        $this->app->singleton(IcoursesRepository::class,coursesRepository::class);
        $this->app->singleton(IassignmentRepository::class,assignmentRepository::class);
        $this->app->singleton(ImaterialRepository::class,materialRepository::class);
        $this->app->singleton(Iuser_coursesRepository::class,user_coursesRepository::class);
        $this->app->singleton(IsubmissionRepository::class,submissionRepository::class);
        $this->app->singleton(IfrontRepository::class,frontRepository::class);


        $this->app->singleton(IpostRepository::class,postRepository::class);


    }


    /**
     * Bootstrap any application services.
     */
    public function boot():void
    {
        //
    }
}

