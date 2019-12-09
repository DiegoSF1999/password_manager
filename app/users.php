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
        return $this->hasMany('App\categories', 'user_id', 'id');
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

    public function get_logged_user(Request $request)
    {
        $token_inv = new Token();

        $coded_token = $request->header('token');
        $decoded_token = $token_inv->decode_token($coded_token);

        $user = users::where('email', $decoded_token[0])->first();

        return $user;
    }

}
