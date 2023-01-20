<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{
    /**
     * Login api
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try {
            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'mensagem' => 'E-mail ou senha inválido',
                ], ResponseAlias::HTTP_UNAUTHORIZED);
            }
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                $success['token'] =  $user->createToken('API_TOKEN')->plainTextToken;
                return response()->json(
                    ['token' => $success['token'] , 'mensagem' => 'Login Efetuado com Sucesso'],
                    ResponseAlias::HTTP_OK);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login api
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        try{
            Auth::logout();
            return response()->json(['message' => 'Logout realizado com sucesso'],ResponseAlias::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
