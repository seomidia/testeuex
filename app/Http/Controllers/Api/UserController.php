<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ResetPasswordNotification;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public $User;

    /**
     * Inicia instancia model user.
     */
    public function __construct(User $user)
    {
        $this->User = $user;
    }

    /**
     * solicitação de registro de usuário.
     */
    public function register(Request $request)
    {
        $validation = $this->User->validateUser($request);

        if ($validation->fails())
            return $this->User->respondWithValidationErrors($validation);

        $user = $this->createUser($request);
        return $this->User->respondWithSuccess('Usuário registrado com sucesso', $user);
    }

    /**
     * solicitação de atualizacao de usuário.
     */
    public function update(Request $request, $id)
    {
        $validation = $this->User->validateUpdateUser($request);
        if ($validation->fails())
            return $this->User->respondWithValidationErrors($validation);

        $user = $this->updateUser($request, $id);
        return $this->User->respondWithSuccess('Usuário atualizado com sucesso', $user);
    }

    /**
     * solicitação de registro de usuário.
     */
    public function delete($id)
    {
        $this->deletarUser($id);
        return $this->User->respondWithSuccess('Usuário removido com sucesso', []);
    }

    /**
     * Criar um novo usuário.
     */
    private function createUser(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function UserExists(Request $request)
    {
        $email = $request->input('email');
        $Exists = User::where('email', $email);
        if ($Exists->count() > 0)
            return response()->json(['user' => $Exists->first()], 200);
        return response()->json(['user' => ''], 404);
    }

    /**
     * Envia lembrete de senha
     * */
    public function forget(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email',$email);
        $UserSend = $user->first();
        if ($UserSend) {
            $token = Str::random(60);
            $UserSend->notify(new ResetPasswordNotification($token));
            $user->update(['remember_token'=>$token]);
            return $this->User->respondWithSuccess('Lembrete enviado', $user);
        }
    }

    /**
     * Atualiza password
    */
    public function setPassword(Request $request)
    {
        $token = $request->input('token');
        $password = Hash::make($request->input('password'));
        User::where('remember_token', $token)->update(['password'=>$password]);
        return $this->User->respondWithSuccess('Senha atualizada', []);

    }
    /**
     * Atualizar um usuário.
     */
    private function updateUser(Request $request, $id)
    {
        extract($request->all());
        $args = [];

        if (isset($name))
            $args['name'] = $name;

        if (isset($email))
            $args['email'] = $email;

        if (isset($password))
            $args['password'] = Hash::make($request->password);

        return User::where('id', $id)->update($args);
    }
    

    /**
     * Deletar um usuário.
     */
    private function deletarUser($id)
    {
        return User::where('id', $id)->delete();
    }
}
