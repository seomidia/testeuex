<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Contact;
use App\Helpers\Helpers;

class ContactController extends Controller
{
    protected $Contact;
    protected $Helpers;

    public function __construct(Contact $Contact,Helpers $Helpers)
    {
        $this->Contact = $Contact;
        $this->Helpers = $Helpers;
    }

    /**
     * Busca endereco por via cep.
     */
    public function viacep(Request $request)
    {
        extract($request->all());
        $response = Http::get( 'https://viacep.com.br/ws/'.$cep.'/json/');
        if ($response->successful()) {
            return response()->json(['viacep'=>json_decode($response->body())]);
        } else {
            return response()->json(['viacep'=>'Não foi possivel encontrar']);
        }
    }

    /**
     * validar contato a ser cadastrado.
     */
    public function store(Request $request)
    {
        $validation = $this->Contact->validateContact($request);
        
        if ($validation->fails())
            return $this->Contact->respondWithValidationErrors($validation);

        $Contact = $this->createContact($request);
        return $this->Contact->respondWithSuccess('Contato registrado com sucesso', $Contact);

    }

    /**
     * Criar um novo contato.
     */
    private function createContact(Request $request)
    {
        return Contact::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'lat' => $request->lat,
            'log' => $request->log,
            'cpf' => $request->cpf,
            'users_id' => $request->users_id
        ]);
    }

    /**
     * Valida contato a s atualizado.
     */
    public function update(Request $request,$id)
    {
        $validation = $this->Contact->validateContactUpdate($request,$id);
        
        if ($validation->fails())
            return $this->Contact->respondWithValidationErrors($validation);

        $Contact = $this->updateContact($request,$id);
        return $this->Contact->respondWithSuccess('Atualização realizada com sucesso', $Contact);

    }

    /**
     * Atualiza contato.
     */
    private function updateContact(Request $request,$id)
    {
        return Contact::where('id',$id)->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'lat' => $request->lat,
            'log' => $request->log,
        ]);
    }

    public function delete($id)
    {
        $this->deleteContact($id);
        return $this->Contact->respondWithSuccess('Remoção realizada com sucesso',[]);
    }

    private function deleteContact($id)
    {
        return Contact::where('id',$id)->delete();
    }

    public function contactById($id)
    {
        return Contact::find($id);
    }

    public function search($termo){
        if($this->Helpers->Ehcpf($termo)){
            return Contact::where('cpf',$termo)->get();
        }
        return Contact::where('nome','like','%'.$termo.'%')->get();
    }
}
