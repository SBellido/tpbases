<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PosicionesLibresController extends Controller
{
    function showDate(Request $request)
    {
        
        if ($request->datestart)
        {
            $lugaresvacios = \DB::select("SELECT p.nro_posicion, p.nro_fila, p.nro_estanteria
            FROM unc_247108.gr09_posicion p JOIN unc_247108.gr09_alquiler_posiciones ap
                ON p.nro_posicion = ap.nro_posicion AND p.nro_estanteria = ap.nro_estanteria AND p.nro_fila = ap.nro_fila
                JOIN unc_247108.gr09_alquiler a ON ap.id_alquiler = a.id_alquiler
                WHERE to_date(?, 'YYYY-MM-DD') NOT BETWEEN a.fecha_desde AND a.fecha_hasta
            ",  [$request->datestart]); //Día ingresado por el usuario
            
        }
        else{
            $lugaresvacios = \DB::select("SELECT p.nro_posicion, p.nro_fila, p.nro_estanteria
            FROM unc_247108.gr09_posicion p JOIN unc_247108.gr09_alquiler_posiciones ap
                ON p.nro_posicion = ap.nro_posicion AND p.nro_estanteria = ap.nro_estanteria AND p.nro_fila = ap.nro_fila
                JOIN unc_247108.gr09_alquiler a ON ap.id_alquiler = a.id_alquiler
                WHERE to_date(?, 'YYYY-MM-DD') NOT BETWEEN a.fecha_desde AND a.fecha_hasta
            ",  [\Carbon\Carbon::now()]); //Fecha actual en PHP
        }
        return view('posicionesLibres', [
            "lugaresvacios" => $lugaresvacios,
            "datestart" => $request->datestart
        ]);
        
        
    }

    function showByUser(Request $request)
    {
        
        $clientes =   \DB::select("SELECT * FROM unc_247108.gr09_cliente");

        if (!$request->has('cliente'))
        {
            $lugaresOcupados = [];
            
        }
        else{            
            $lugaresOcupados = \DB::select("SELECT p.nro_posicion, p.nro_fila, p.nro_estanteria
            FROM unc_247108.gr09_posicion p JOIN unc_247108.gr09_alquiler_posiciones ap
                ON p.nro_posicion = ap.nro_posicion AND p.nro_estanteria = ap.nro_estanteria AND p.nro_fila = ap.nro_fila
                JOIN unc_247108.gr09_alquiler a ON ap.id_alquiler = a.id_alquiler
                WHERE a.id_cliente = ? AND to_date(?, 'YYYY-MM-DD') BETWEEN a.fecha_desde AND a.fecha_hasta
            ",  [$request->cliente, \Carbon\Carbon::now()]); //Fecha actual en PHP
        }
        return view('posiciones-usuario', [
            "lugaresvacios" => $lugaresOcupados,
            "datestart" => $request->datestart,
            "clientes" => $clientes,
        ]);
        
        
    }

}
