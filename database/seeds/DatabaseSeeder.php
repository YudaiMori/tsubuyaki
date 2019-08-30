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

        factory(\App\Models\Post::class, 20)
            ->create([
                'user_id' => $user->id,
                ])
            ->each(function (\App\Models\Post $post) {
                $post->comments()->saveMany(factory(App\Models\Comment::class, rand(0, 3))->make());
            });
    }
}
