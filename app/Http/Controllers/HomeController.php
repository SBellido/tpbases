<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $voluntarios = \DB::select('select * from unc_esq_voluntario.voluntario LIMIT 10');

        return view('home', [
            "voluntarios" => $voluntarios,
        ]);
    }
}
