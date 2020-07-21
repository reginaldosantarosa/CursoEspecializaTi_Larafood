<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthClienteController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_nome' => 'required',
        ]);

        $cliente = Cliente::where('email', $request->email)->first();

        if (!$cliente || !Hash::check($request->password, $cliente->password)) {
            return response()->json(['message' => trans('messages.invalid_credentials')], 404);
        }

        $token = $cliente->createToken($request->device_nome)->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function me(Request $request)
    {
        $cliente = $request->user();

        return new ClienteResource($cliente);
    }

    public function logout(Request $request)
    {
        $cliente = $request->user();

        // Revoke all tokens client...
        $cliente->tokens()->delete();

        return response()->json([], 204);
    }
}
