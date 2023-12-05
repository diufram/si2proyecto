<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Horarios;
use App\Models\Mesa;
use App\Models\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function reservacreate(Request $request){
       /* $cantMesas = DB::select('SELECT count() FROM reservas, horarios, reservaToHorario  WHERE fecha = ? and reservas.id = reservaToHorario.reserva_id and horarios.id = reservaToHorario.horario_id  and reservaToHorario.horario_id = ? ',["2023-11-21",1]);
        if($cantMesas <= 20 ){
            return response()->json(true,200);
        }else{
            return response()->json(false,200);
        }
        $cantMesas = Horario::all($request->id);
        if($cantMesas->cantidad > 0){
            return response()->json(true,200);
        }else{
            return response()->json(false,200);
        }
*/
        $reserva = new Reservas();
        $reserva->user_id =$request->user()->id;
        $reserva->hora_id =$request->hora;
        $reserva->estado = true;        
        $reserva->fecha= $request->fecha;
        $reserva->save();
    }

    public function reservas(Request $request){
        $reserva = DB::select('SELECT reservas.id, horarios.hora, reservas.fecha FROM reservas, horarios WHERE  reservas.hora_id = horarios.id  and  user_id = ?',[$request->user()->id]);
       // $reserva =Reservas::all();
        return response()->json($reserva,200);
    }

    public function horarios(Request $request){
        $horarios =  Horarios::all();
        return response()->json($horarios,200);
    }

}
