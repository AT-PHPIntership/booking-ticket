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
        for ($i = 0; $i < 10; $i++) { 
            DB::table('bookings')->insert([
                'user_id' => App\Models\User::all()->random()->id,
            ]);
        }
    }
}
