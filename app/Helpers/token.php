<?php
namespace App\Helpers;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\users;
class Token
{
    private  $key = 'sfaojdsfjsaFJAJjjoadsjDFHGDsdgdfHDHSgFMFFc3245q435,mmbnZdf?¿YU"24trefvdcfhd';
    public function encode_token($email, $changed)
    {
        $data = array($email, $changed);
        $token = JWT::encode($data, $this->key);
        return $token;
    }
    public function decode_token($token)
    {
        return JWT::decode($token, $this->key, array('HS256'));
    }
}
