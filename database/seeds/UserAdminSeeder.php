<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \app\user::create([
          'name' => 'Fabien',
          'email' => 'sketeuf@hotmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('1234'),
          'remember_token' => Str::random(10),
          'is_admin' => 1,
          'approved_at'=> now(),

      ]);
    }
}
