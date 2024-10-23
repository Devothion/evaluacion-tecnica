<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateTokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;

class UserTokenController extends Controller
{

    public function generateToken(GenerateTokenRequest $request)
    {
        // $request->validateWithBag('tokenCreation', [
        //     'nombre' => ['required', Rule::unique('personal_access_tokens', 'name')->where('tokenable_id', $request->user()->id)->where('tokenable_type', get_class($request->user()))],
        // ]);

        $user = Auth::user();
        $token = $user->createToken($request->get('nombre'));
        return redirect()->back()->with(['token' => $token->plainTextToken, 'nombre' => $request->get('nombre'), 'success' => 'Token generado exitosamente.'])->withFragment('generate-user-apitoken');;
    }

    public function deleteToken($id, Request $request)
    {
        // Obtener el token por su id
        $token = PersonalAccessToken::findOrFail($id);

        // Verificar que el token pertenezca al usuario autenticado
        if ($token->tokenable_id !== $request->user()->id || $token->tokenable_type !== get_class($request->user())) {
            return redirect()->back()->with('error', 'No tienes permisos para eliminar este token.');
        }

        // Eliminar el token
        $token->delete();
        return redirect()->back()->with('success', 'Token eliminado exitosamente.')->withFragment('generate-user-apitoken');;
    }

}
