<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\users;

class categories extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'user_id'];
    public $timestamps = false;



    public function users(){
            return $this->belongsTo('App\users', 'user_id');
    }
   

    public function passwords()
    {
        return $this->hasMany('App\passwords', 'category_id', 'id');
    }

    public function new(Request $request)
    {
        $category = new Self();

        $category->name = $request->name;

        $post->comments()->save($comment);
    }

}
