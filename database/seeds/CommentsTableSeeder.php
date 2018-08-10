<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\Models\User::all();
        $films = App\Models\Film::all();
        factory(App\Models\Comment::class,10)->create([
            'user_id' => $users->random()->id,
            'film_id' => $films->random()->id,
        ]);
    }
}
