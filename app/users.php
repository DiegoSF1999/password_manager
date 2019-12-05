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

        $token_inv = new Token();
        $token = $token_inv->encode_token($user->email, $user->changed);
        return response()->json([
           'token' => $token
        ], 200);
    }
    public function login(Request $request)
    {
        //$data = ['email' => $request->email];
        $user = self::where('email', $request->email)->first();
        if ($user) {
            if ($user->password == $request->password) {
                //$token = new Token($data);
                //$encoded_token = $token->set_token($user->email);
                //return response()->json([
                 //   'token' => $encoded_token
                //], 200);
                return $user;
            } else {
                return response()->json([
                    'message' => "incorrect data"
                ], 401);
            }
        } else {
            return response()->json([
                'message' => "incorrect data"
            ], 401);
        }
    }


}
