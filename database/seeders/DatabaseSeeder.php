<?php

namespace Database\Seeders;
use App\Models\coursesModel;
use App\Models\departmentModel;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        departmentModel::factory(10)->create();
        User::factory(30)->create();
    //    coursesModel::factory(10)->create();


    }
}
