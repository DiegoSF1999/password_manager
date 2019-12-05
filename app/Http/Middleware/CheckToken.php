<?php
namespace App\Http\Middleware;
use Closure;
use App\User;
use App\Helpers\Token;
class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            
            $request_data = getdata($request);

     

            $received_user = User::where('email', $verified_email)->first();
            $received_email = $received_user->email;
            if($received_email == $verified_email) {
                return $next($request);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "access unavailable"
            ], 401);
        }

      
    }
    private function get_request_data($request)
    {
        $token_inv = new Token();
        $request_token = $request->header('token');
        $decoded_request_token = $token_inv->decode_token($request_token);

        var_dump($decoded_request_token);exit;


    }
}