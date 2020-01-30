<?php

use Illuminate\Database\Seeder;
// use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Yuichiro Sakurada',
            'email' => '5yuichiro5@gmail.com',
            'password' => bcrypt('fjmagic1'),
        ]);
    }
}
