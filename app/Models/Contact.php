<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['users_id','nome','cpf','telefone','endereco','cidade','estado','cep','complemto','lat','log'];

    /**
     * relacionamento um para um
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Validar dados de registro do usuário api.
     */
    public function validateContact(Request $request)
    {
        return Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string',
            'endereco' => 'required|string',
            'cep' => 'required|string',
            'lat' => 'required|string',
            'log' => 'required|string',
            'cpf' => 'required|unique:contacts|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
        ]);
    }

    /**
     * Validar dados de ATUALIZACAO do usuário api.
     */
    public function validateContactUpdate(Request $request)
    {
        return Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string',
            'endereco' => 'required|string',
            'cep' => 'required|string',
            'lat' => 'required|string',
            'log' => 'required|string',
        ]);
    }

   /**
     * Resposta com erros de validação.
     */
    public function respondWithValidationErrors($validator)
    {
        return response()->json([
            'errors' => $validator->errors()
        ], 400);
    }

    /**
     * Resposta com mensagem de sucesso.
     */
    public function respondWithSuccess($message, $contact)
    {
        return response()->json([
            'message' => $message,
            'contact' => $contact
        ], 201);
    }

    

}