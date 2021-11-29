<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function register(Request $request)
    {
      
    

        User::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' => app('hash')->make($request->input('password')),
            'endereco' => $request->input('endereco'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
            'telefone' => $request->input('telefone'),
            'pagamento' => $request->input('pagamento'),

           ]);

        return response()->json(['status' => 'sucesso', 'operacao' => 'Criado com sucesso']);

    }

   
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {

            return response()->json(['error' => 'Acesso negado'], 401);

        }

        return $this->respondWithToken($token);
    }

   
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
        ]);
    }
}