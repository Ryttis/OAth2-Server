<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{     
    public function login(Request $request){
       var_dump($request);
       exit;
        try {
            $response = Http::post(config('services.passport.login_endpoint'),[
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('ervices.passport.client_id'),
                    'client_secret' => config('ervices.passport.client_secret'),
                    'username' => 'prytis@gmail.com',
                    'password' => 'bobikas397410',
                ]
            ]);
            return $response->body();
        } Catch (\GuzzleHttp\Exception\BadResponseException $e){
                if ($e->getCode() === 400) {
                    return response()->json('Invalid request. Please enter user name or password.'
                    ,$e->getCode());
                } else if ( $e->getCode() === 401) {
                    return response()->json('Your ceredencials are incorrect.',$e->getCode()); 
                }
                return response()->json('Something went wrong on servet.',$e->getCode());  
        }
    }
    
}
