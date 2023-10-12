<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        // el metodo index se usa para mostrar la pagina principal del crud

        $categoria = Categoria::all();
        return view("categoria/inicio", compact('categoria'));
    }

    public function create() {
        // el metodo index se usa para mostrar la pagina principal del crud
        
        $categoria = Categoria::all();
        return view("categoria.agregar", compact('categoria'));
    }


    public function edit($id) {
        // el metodo index se usa para mostrar la pagina principal del crud
        $categoria = Categoria::find($id);
        return view("categoria/editar", compact('categoria'));
    }
    
    public function update(Request $request, $id) {
        // el metodo index se usa para mostrar la pagina principal del crud
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->post('nombre');
        $categoria->save();
        return redirect()->route('categoria.inicio')->with('warning', 'Actualizado con exito');
    }

    public function show($id){
        $categoria = Categoria::find($id);
        return view('categoria/eliminar', compact('categoria'));
    }
    
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categoria.inicio')->with('danger', 'Eliminado con exito!');

    }

    public function store(Request $request)
    {
        
        $categoria = new Categoria();
        $categoria->nombre = $request->post('nombre');
        $categoria->save();
        return redirect()->route('categoria.inicio')->with('success', 'Agregado con exito');
    }

}
