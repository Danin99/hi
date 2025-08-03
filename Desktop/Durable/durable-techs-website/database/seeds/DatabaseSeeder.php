<?php

use App\Models\Category;
// use Database\Seeders\MenuSeeder;
use Illuminate\Database\Seeder;
// use App\Database\Seeders\CategorySeeder;
use MenuSeeder as GlobalMenuSeeder;
use CategorySeeder as GlobalCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(GlobalCategorySeeder::class);
        $this->call(GlobalMenuSeeder::class);
    }
}
