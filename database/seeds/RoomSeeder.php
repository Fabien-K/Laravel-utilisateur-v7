<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Room::class)->create([
            'title'=> 'Recrutement!'
        ]);
        factory(\App\Room::class)->create([
            'title'=> 'Public'
        ]);
        
    }
}
