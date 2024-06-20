<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Helpers
{
    protected $Url_base;

    public function __construct()
    {
        $this->Url_base = env('URL_ENDPOINT');
    }

    /**
     *  Metodo ponsavel pelas requisições e authticação basica
     * */
    public function RequestApi($Type, $Endpoint, $Args = null)
    {
        $Request = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('USER_API') . ':' . env('PASS_API'))
        ]);

        switch ($Type) {
            case 'post':
                return $Request->post($this->Url_base . $Endpoint, $Args);
                break;
            case 'get':
                return $Request->get($this->Url_base . $Endpoint);
                break;
            case 'put':
                return $Request->put($this->Url_base . $Endpoint, $Args);
                break;
            case 'delete':
                return $Request->delete($this->Url_base . $Endpoint, $Args);
                break;
        }
    }

    /**
     *  Metodo ponsavel por idtificar um cpf valido
     * */
    public function Ehcpf($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) != 11) {
            return false;
        }

        if (!preg_match('/^\d{11}$/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
