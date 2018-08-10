<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\Models\User::all();
        for ($i = 0; $i < 10; $i++) { 
            DB::table('bookings')->insert([
                'user_id' => $users->random()->id,
            ]);
        }
    }
}
