<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helpers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected $Helpers;
    protected $User;

    public function __construct(User $User, Helpers $Helpers)
    {
        $this->Helpers = $Helpers;
        $this->User = $User;
    }
    /**
     * View pagina login.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * View pagina esqueci a senha.
     */
    public function forget()
    {
        return view('auth.forget');
    }

    /**
     * View pagina criar usuario.
     */
    public function createUser()
    {
        return view('auth.register');
    }
    
    /*
    * View redefinir senha
    */
    public function reset($token)
    {
        return view('auth.reset',compact('token'));
    }

    /**
     * Atualiza senha
    */
    public function updatePassword(Request $request)
    {
        $password = $request->input('password');
        $token = $request->input('token');
        $response = $this->Helpers->RequestApi('put', '/api/user/password', [
            'password' => $password,
            'token' => $token,
        ]);
        if ($response->successful()) {
            $feedback = json_decode($response->body());
            return redirect()->route('login')->with('success', $feedback->message);
        } else {
            $feedback = end(json_decode($response->body())->errors);
            return redirect()->back()->with('errors', end($feedback));
        }
  
    }
    /**
     * Request para criar um usuario.
     */
    public function storeUser(Request $request)
    {
        $this->User->validateUpdateUser($request);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $response = $this->Helpers->RequestApi('post', '/api/user/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        if ($response->successful()) {
            $feedback = json_decode($response->body());
            return redirect()->route('login')->with('success', $feedback->message);
        } else {
            $feedback = end(json_decode($response->body())->errors);
            return redirect()->back()->with('errors', end($feedback));
        }
    }

    /**
     * Request para autenticar um usuario.
     */
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if(is_null($email)){
            return redirect()->back()->with('errors', 'Informe o e-mail.');
        }elseif(is_null($password)){
            return redirect()->back()->with('errors', 'Informe a senha.');
        }

        $response = $this->Helpers->RequestApi('post', '/api/user/exists', [
            'email' => $email
        ]);

        $credentials = $request->only('email', 'password');

        if ($response->successful()) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->back()->with('errors', 'Credenciais inválidas. Verifique seu email e senha.');
            }
        } else {
            return redirect()->back()->with('errors', 'E-mail ou senha incorreto');
        }
    }

    /**
     * Envia lembrete de senha por email
     */
    public function forgetSend(Request $request)
    {
        $email = $request->input('email');
        if(is_null($email)){
            return redirect()->back()->with('errors', 'Informe o e-mail.');
        }

        $response = $this->Helpers->RequestApi('post', '/api/user/lembrar-senha', [
            'email' => $email
        ]);

        return redirect()->route('login')->with('success', 'Se seu e-mail estiver cadastrado, enviaremos um lembre de senha.');
    }

    /**
     * Request para criar um usuario.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
