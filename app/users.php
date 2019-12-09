<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Helpers\Token;

class users extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'password', 'changed'];
    public $timestamps = false;


    public function categories()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    public function register(Request $request)
    {
        $user = new self();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->changed = 0;
        $user->save();

        return $this->getTokenFromUser($user);
    }
    public function login(Request $request)
    {

        try {

            $user = self::where('email', $request->email)->first();

           if ($user->password == $request->password)
           {
            return $this->getTokenFromUser($user);

           } else {
            return response()->json([
                'message' => "wrong data"
            ], 401);
           }

        } catch (\Throwable $th) {
            return response()->json([
                'message' => "wrong data"
            ], 401);
        }
        

    }

    private function getTokenFromUser($user)
    {
        $token_inv = new Token();
        $token = $token_inv->encode_token($user->email, $user->changed);
        return response()->json([
           'token' => $token
        ], 200);
    }

}
