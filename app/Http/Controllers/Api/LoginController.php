<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    protected $User;

    public function __construct(User $User)
    {
        $this->User = $User;
    }

    public function Authenticate(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validation->fails())
            return $this->User->respondWithValidationErrors($validation);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Autenticado!',
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'message' => 'Falha na autenticação!',
                'success' => false
            ], 200);
        }
    }

}
