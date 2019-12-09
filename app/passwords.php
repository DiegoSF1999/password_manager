<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\categories;

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


    public function new(Request $request)
    {
        try {
            $password = new Self();

            $password->title = $request->title;
            $password->description = $request->description;
            $password->category_id = $request->category_id;
    
            $password->save();
    
            return response()->json([
                'message' => "password created"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id did not match"
            ], 401);
        }

    }

    public function change_post(Request $request)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($request->category_id);
            $password = $category->passwords()->find($request->password_id);
    
            if ($request->title != null)
            {
                $passwords->update(['title' => $request->title]);
            }
    
            if ($request->description != null)
            {
                $passwords->update(['description' => $request->description]);
            }
    
            return response()->json([
                'message' => "password changed"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id or password_id did not match"
            ], 401);
        }

    }

    public function change_patch(Request $request, $id)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($request->category_id);
            $password = $category->passwords()->find($id);
    
            if ($request->title != null)
            {
                $passwords->update(['title' => $request->title]);
            }
    
            if ($request->description != null)
            {
                $passwords->update(['description' => $request->description]);
            }
    
            return response()->json([
                'message' => "password changed"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id or password_id did not match"
            ], 401);
        }

    }

    public function remove_post(Request $request)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($request->category_id);
            $password = $category->passwords()->find($request->password_id);
    
          $password->delete();
    
            return response()->json([
                'message' => "password removed"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id or password_id did not match"
            ], 401);
        }

    }

    public function remove_patch(Request $request, $id)
    {
        try {
            $users_inv = new users();
            $user = $users_inv->get_logged_user($request);
    
            $category = $user->categories()->find($request->category_id);
            $password = $category->passwords()->find($id);
    
          $password->delete();
    
            return response()->json([
                'message' => "password removed"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "category_id or password_id did not match"
            ], 401);
        }

    }

    public function get_passwords(Request $request)
    {
        $users_inv = new users();
        $user = $users_inv->get_logged_user($request);

        $categories = $user->categories()->get();
        
        $passwords = array();

        for ($i=0; $i < count($categories); $i++) { 

            $temp = $categories[$i]->passwords()->get();

            for ($o=0; $o< count($temp); $o++) {
                array_push($passwords, $temp[$o]);
            }
         
        }

        return $passwords;

    }

    public function get_ordered_passwords(Request $request)
    {
        $users_inv = new users();
        $user = $users_inv->get_logged_user($request);

        $categories = $user->categories()->get();
        
        $passwords = array();

        $category_temp = array();
        $passwords_temp = array();
            

        for ($i=0; $i < count($categories); $i++) { 

            $category_temp = json_encode($categories[$i]);

            $passwords_temp = json_encode($categories[$i]->passwords()->get());

            $readyforadd = array( 
      
                $category_temp =>  $passwords_temp
                      
            ); 

            

            array_push($passwords, $readyforadd);
         
        }  

        return $passwords;

    }

}

