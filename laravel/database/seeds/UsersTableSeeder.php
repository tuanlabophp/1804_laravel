<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->get()->count() == 0) {
        	DB::table('users')->insert([
        		'id' => 1,
        		'username' => '1804laravel',
        		'password' => Hash::make('123456'),
        		'status' => 1
        	]);
        } else {
        	echo "Table Users is not empty!";
        }
    }
}
