<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->get()->count() == 0) {
        	DB::table('categories')->insert([
        		'id' => 1,
        		'name' => 'First Category'
        	]);
        } else {
        	echo "Table Categories is not empty!";
        }
    }
}
