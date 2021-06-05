<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $Categoria = $request->get('Busqueda');
        $Nombre = $request->get('BNombre');
        $Articulos = Articulo::orderBy('id')->where('Categoria','LIKE','%'.$Categoria.'%')
            ->where('Nombre','LIKE','%'.$Nombre.'%')
            ->paginate(6);

        return view('home',['Articulos'=>$Articulos,'Categoria'=>$Categoria , 'Nombre'=>$Nombre]);
    }
}
