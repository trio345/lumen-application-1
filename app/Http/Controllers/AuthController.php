<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Lcobucci\JWT\Token;
use Firebase\JWT\JWT;
class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function authenticate(Request $request)
    {
        $key = "kode_rahasia";
        $payload = [
            "iss" => "lumen",
            "sub" => $request->input("username"),
            "pass" => $request->input("password"),
            "iat" => time(),
            "nbf" => time(),
            // "exp" => time() + 60 * 60
        ];

        // $jwt_encode = JWT::encode($payload, $key);
        // $jwt_decode = JWT::decode($jwt_encode, $key, array('HS256'));
        $res_raw = [
            "messages" => "Register Success",
            "token" => JWT::encode($payload, $key)
        ];

        return response()->json($data = $res_raw);
    }
}
