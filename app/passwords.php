<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class passwords extends Model
{
    protected $table = 'passwords';
    protected $guarded = ['id'];
    protected $fillable = ['title', 'description', 'category_id'];
    public $timestamps = false;


    public function categories()
    {
        return $this->belongsTo('App\categories', 'category_id');
    }


}
