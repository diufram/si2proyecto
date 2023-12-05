<?php

namespace App\Http\Controllers;

//use GuzzleHttp\Psr7\Request;
//ante algun error descomentar esto y comentar el request de abajo 
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
 


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function saveToLog(Request $request,string $accion,$objeto){
        //pruebas
        $ip = $request->ip();
        $user = Auth::user();

        $logMessage = "IP: $ip, Usuario: " . ($user ? $user->nombre : 'Usuario anónimo') . ", Id: " . ($user ? $user->id : 'Usuario anónimo') . " , Acción: $accion , Elemento: $objeto";
        Log::channel('confidential')->info($logMessage);
        //pruebas
    }
}
