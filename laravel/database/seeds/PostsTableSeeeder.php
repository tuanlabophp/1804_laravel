<?php

use Illuminate\Database\Seeder;

class PostsTableSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('posts')->get()->count() == 0) {
        	DB::table('posts')->insert([
        		[
        			'id' => 1,
        			'title' => 'First post',
        			'description' => 'First description',
        			'status' => 1,
                    'category_id' => 1,
                    'content' => 'First content'
        		]
        	]);
        } else {
        	echo "Table Posts is not empty!";
        }
    }
}
