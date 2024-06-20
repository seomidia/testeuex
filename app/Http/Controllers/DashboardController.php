<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Helpers\Helpers;

class DashboardController extends Controller
{
    protected $Contact;
    protected $Helpers;

    public function __construct(Contact $Contact,Helpers $Helpers)
    {
        $this->Contact = $Contact;
        $this->Helpers = $Helpers;
    }

    /**
     * Visualizar detalhes do contato.
     */
    public function index()
    {
        $Users = User::find(Auth::user()->id);
        $Users =  $Users->contacts()->orderBy('nome', 'asc')->get();
        $coordenadas = $this->Coordenadas($Users);
        return view('dashboard.index',compact('Users','coordenadas'));
    }

    /**
     * Monta array de coordenadas p/ mapa
     */
    public function Coordenadas($contacts)
    {
        $contatos = [];
        foreach ($contacts as  $contact) {
            $contatos[] = ['lat' => $contact->lat, 'lng' => $contact->log, 'title' => $contact->nome];
        }
        return $contatos;
    }

    /**
     * Busca contato a partir de um termo
     */
    public function SearchContatos(Request $request)
    {
        $term = $request->input('s');

        $response = $this->Helpers->RequestApi('get', '/api/contato/search/' . $term);

        if ($response->successful()) {
            $contatos = json_decode($response->body());
            $coordenadas = $this->Coordenadas($contatos);

            return view('dashboard.search',compact('contatos','coordenadas'));
        } else {
            echo $response->body();
            $feedback = end(json_decode($response->body())->errors);
            return redirect()->back()->with('errors', end($feedback));
        }
 
    }

    public function AccontDelete()
    {
        $user_id = Auth::user()->id;
        $response = $this->Helpers->RequestApi('delete', '/api/user/'.$user_id.'/delete');

        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Conta deletada com sucesso!');
        } else {
            return redirect()->back()->with('errors', 'Erro ao deletar a conta!');
        }
    }
}