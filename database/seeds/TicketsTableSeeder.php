<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeTicket = array(array("Adult", 60000), array("Childrent", 45000)
                            , array("Student", 45000));
        $schedules = App\Models\Schedule::all();
        for ($i = 0; $i < 10; $i++) { 
            $ticket = $typeTicket[array_rand($typeTicket)];
            DB::table('tickets')->insert([
                'schedule_id' => $schedules->random()->id,
                'price' => $ticket[1],
                'type' => $ticket[0]
            ]);
        }
    }
}
