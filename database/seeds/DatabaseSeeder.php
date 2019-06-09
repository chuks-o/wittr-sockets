<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User as AppUser;
use App\Trend;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(AppUser::class, 20)->create();
        factory(Post::class, 40)->create();
        factory(Trend::class, 50)->create();
    }
}
