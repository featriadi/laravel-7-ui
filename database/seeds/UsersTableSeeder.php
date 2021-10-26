<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        for($i=0; $i<15; $i++){
            $input = ['admin','editor','author'];
            $rand_keys = array_rand($input);
            $data[$i] = [
               'name' => $faker->name,
               'email' => $faker->unique()->safeEmail,
               'email_verified_at' => now(),
               'password' => bcrypt('password'),
               'remember_token' => Str::random(10),
               'role' => $input[$rand_keys],
            ];
        }
        
        DB::table('users')->insert($data);
    }
}
