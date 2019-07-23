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
            'name' => 'Nguyễn Sơn',
            'email' => 'nguyenthaison3999@gmail.com',
            'password' => bcrypt('Nguyen'),
            'ruler' => 1,
            'status' => 1,
        ]);
    }
}
