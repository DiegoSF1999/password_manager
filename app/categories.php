<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

        $category->user_id = users::where('email', $request->email)->first()->id;

        $category->save();

        return $category;
    }

    public function change_post(Request $request, $id)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($request->category_id);

            $category->update(['name' => $request->name]);
    
            return $category;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id did not match or repeated name"
            ], 401);
        }


    }

    public function change_patch(Request $request, $id)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($id);

            $category->update(['name' => $request->name]);
    
            return $category;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id did not match or repeated name"
            ], 401);
        }


    }

    public function remove_post(Request $request)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($request->category_id);
            $category->delete();
    
            return response()->json([
                'message' => "category deleted"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id did not match"
            ], 401);
        }


    }

    public function remove_patch(Request $request, $id)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($id);
            $category->delete();
    
            return response()->json([
                'message' => "category deleted"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id did not match"
            ], 401);
        }


    }

    public function get_categories(Request $request)
    {
        $users_inv = new users();
        $user = $users_inv->get_logged_user($request);

        $categories = $user->categories()->get();

        return $categories;
    }

}
