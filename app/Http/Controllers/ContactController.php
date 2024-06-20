<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    protected $Contact;
    protected $Helpers;

    public function __construct(Contact $Contact, Helpers $Helpers)
    {
        $this->Contact = $Contact;
        $this->Helpers = $Helpers;
    }

    /**
     * Pagina para criaçao do contato.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Metodo de percistcia do contato.
     */
    public function store(Request $request)
    {
        $this->Contact->validateContact($request);

        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $endereco = $request->input('endereco');
        $cidade = $request->input('cidade');
        $estado = $request->input('estado');
        $cep = $request->input('cep');
        $lat = $request->input('lat');
        $log = $request->input('long');
        $cpf = $request->input('cpf');

        $response = $this->Helpers->RequestApi('post', '/api/contato/criar', [
            'nome' => $nome,
            'telefone' => $telefone,
            'endereco' => $endereco,
            'cidade' => $cidade,
            'estado' => $estado,
            'cep' => $cep,
            'lat' => $lat,
            'log' => $log,
            'cpf' => $cpf,
            'users_id' => Auth::user()->id
        ]);

        if ($response->successful()) {
            $feedback = json_decode($response->body());
            return redirect()->route('admin.index')->with('success', $feedback->message);
        } else {
            echo $response->body();
            $feedback = end(json_decode($response->body())->errors);
            return redirect()->back()->with('errors', end($feedback));
        }
    }

    /**
     * Visualizar detalhes do contato.
     */
    public function show($id)
    {
        $response = $this->Helpers->RequestApi('get', '/api/contato/' . $id);
        if ($response->successful()) {
            $contatos = json_decode($response->body());
            $coordenadas[] = ['lat' => $contatos->lat, 'lng' => $contatos->log, 'title' => $contatos->nome];
            return view('contact.show', compact('contatos','coordenadas'));
        } else {
            echo $response->body();
            $feedback = end(json_decode($response->body())->errors);
            return redirect()->back()->with('errors', end($feedback));
        }
    }

    /**
     * Form mulario de atualizacao do contato.
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Methodo para atualizacao do contato.
     */
    public function update(Request $request, $id)
    {
        $this->Contact->validateContact($request);

        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $endereco = $request->input('endereco');
        $cidade = $request->input('cidade');
        $estado = $request->input('estado');
        $cep = $request->input('cep');
        $lat = $request->input('lat');
        $log = $request->input('long');
        $cpf = $request->input('cpf');

        try {
            $response = $this->Helpers->RequestApi('put', '/api/contato/update/' . $id, [
                'nome' => $nome,
                'telefone' => $telefone,
                'endereco' => $endereco,
                'cidade' => $cidade,
                'estado' => $estado,
                'cep' => $cep,
                'lat' => $lat,
                'log' => $log,
                'cpf' => $cpf
            ]);
    
            if ($response->successful()) {
                $feedback = json_decode($response->body());
                return redirect()->route('admin.index')->with('success', $feedback->message);
            } else {
                $feedback = end(json_decode($response->body())->errors);
                return redirect()->back()->with('errors', end($feedback));
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }

    /**
     * Remoçao do contato
     */
    public function destroy($id)
    {
        try {
            $response = $this->Helpers->RequestApi('delete', '/api/contato/' . $id . '/delete');
            if ($response->successful()) {
                return redirect()->route('admin.index')->with('success', 'Contato deletado com sucesso!');
            } else {
                return redirect()->back()->with('errors', 'Erro ao deletar o contato!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }

    /**
     * Buscar endereco por cep
     */

    public function viacepApi($cep)
    {
        try {
            $response = $this->Helpers->RequestApi('post', '/api/viacep', [
                'cep' => $cep
            ]);
            return $this->Contact->respondWithSuccess('success', json_decode($response->body()));
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }
}
