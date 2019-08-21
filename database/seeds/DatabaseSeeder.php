<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $user = factory(\App\User::class)->create([
            'email' => 'ymori@fourmix.co.jp',
        ]);

        factory(\App\Models\Post::class, 50)->create([
            'user_id' => $user->id,
        ]);
    }
}
