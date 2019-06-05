<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $voluntarios = \DB::select('select * from unc_247108.GR09_pallet LIMIT 10');

        return view('home', [
            "voluntarios" => $voluntarios,
        ]);
    }

    public function instituciones()
    {
      $instituciones = \DB::select('select nombre_institucion from unc_esq_voluntario.institucion LIMIT 10');

            return view('instituciones', [
                "instituciones" => $instituciones,
            ]);
    }
 /*   public function posiciones_libres($value='2018/')
    {
      $posiciones = \DB::select('select ap.nro_posicion
                                 from alquiler_posiciones ap join alquiler a
                                 on ap.id_alquiler = a.id_alquiler
                                 where ap.estado = true and
                                 to_date('?', 'DDMMYYYY') not between
                                 a.fecha_desde and a.fecha_hasta;');
    }*/
}
