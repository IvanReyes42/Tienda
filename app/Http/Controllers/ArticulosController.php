<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use auth;
use Illuminate\Support\Facades\Storage;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function indexMujer()
    {
        //
        $Articulos = Articulo::where('Categoria','Mujeres')->where('Estatus','Activo')->get();

        return view('Mujeres',['Articulos'=>$Articulos]);
    }
    public function indexHombre()
    {
        //
        $Articulos = Articulo::where('Categoria','Hombres')->where('Estatus','Activo')->get();

        return view('Hombre',['Articulos'=>$Articulos]);
    }
    public function indexChildren()
    {
        //
        $Articulos = Articulo::where('Categoria','Niños')->where('Estatus','Activo')->get();

        return view('Niños',['Articulos'=>$Articulos]);
    }
    public function indexAccesorios()
    {
        //
        $Articulos = Articulo::where('Categoria','Accesorios')->where('Estatus','Activo')->get();

        return view('Accesorios',['Articulos'=>$Articulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


       $url = $request->file('Imagen')->store('public/imagenes');
       $Imagen = Storage::url($url);


        $Articulo = new Articulo();
        $Articulo->user_id = Auth::user()->id;
        $Articulo->Nombre = $request->Producto;
        $Articulo->Descripcion = $request->Descripcion;
        $Articulo->Tallas = $request->Talla;
        $Articulo->Precio = $request->Precio;
        $Articulo->Ofertas = $request->Oferta;
        $Articulo->Categoria = $request->Categoria;
        $Articulo->Imagen =$request->Imagen;
        $Articulo->UrlImagen = $Imagen;
        $Articulo->Estatus = "Activo";

        if($Articulo->save())
        {
            return redirect('/home')->with('guardar','Datos Guardados Correctamente');
        }
        else
        {
            return redirect('/home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Articulo = Articulo::find($id);
        $Articulo->user_id = Auth::user()->id;
        $Articulo->Nombre = $request->Producto;
        $Articulo->Descripcion = $request->Descripcion;
        $Articulo->Tallas = $request->Talla;
        $Articulo->Precio = $request->Precio;
        $Articulo->Ofertas = $request->Oferta;
        $Articulo->Categoria = $request->Categoria;
        $Articulo->Estatus = $request->Estatus;

        if($Articulo->save())
        {
            return redirect('/home')->with('editar','Datos Actualizados Correctamente');
        }
        else
        {
            return redirect('/home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Articulo::destroy($id);
        return redirect('/home')->with('destroy','Datos Eliminado Correctamente');
    }
}
