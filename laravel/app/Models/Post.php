<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
    	'id',
    	'title',
    	'description',
    	'status',
    	'category_id',
    	'content'
    ];

    public function category() {
    	return $this->belongsTo(Category::class);
    }
}
