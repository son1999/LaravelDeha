<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'son',
        	'email' => 'nguyenthaison@gmail.com',
        	'password' => bcrypt('12345678'),
        	'ruler' => '1',
        ]);
    }
}
