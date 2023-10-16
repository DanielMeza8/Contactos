<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Models\Contacto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use DB;


class CrudController extends Controller

{

    public function pieChart(Request $request){
    // Obtén los datos de la tabla SQL según la selección del campo
    

    return view('contactos/inicio', compact('chart'));
    }



    public function index(Request $request) {
        // el metodo index se usa para mostrar la pagina principal del crud
        $user = Auth::user();
        $userID = $user->id;
        $data = Contactos::select('categoriaContacto', Contactos::raw('count(categoriaContacto) as total'))
        ->groupBy('categoriaContacto')
        ->get();

        $chart = new Chart;
        $chart->labels($data->pluck('categoriaContacto')); // Etiquetas para las secciones del pastel
        $chart->dataset('Mi Gráfica de Pastel', 'pie', $data->pluck('total')); // Datos del paste

        $contactos = Contactos::where('creadoPor','=',$userID)->get();
        return view("contactos/inicio", compact('contactos', 'chart'));
    }

    public function create() {
        // el metodo index se usa para mostrar la pagina principal del crud
        
        $contactos = Contactos::all();
        $categoria = Categoria::all();
        return view("contactos.agregar", compact('contactos', 'categoria'));
    }


    public function read() {
        // el metodo index se usa para mostrar la pagina principal del crud
        return view("read");
    }

    public function edit($id) {
        // el metodo index se usa para mostrar la pagina principal del crud
        $contacto = Contactos::find($id);
        $contact = Contacto::all();
        $categoria = Categoria::all();
        return view("contactos/editar", compact('contacto', 'contact', 'categoria'));
    }
    
    public function update(Request $request, $id) {
        // el metodo index se usa para mostrar la pagina principal del crud
        $contacto = Contacto::find($id);
        $contacto->nombre = $request->post('nombre');
        $contacto->apellidos = $request->post('apellido');
        $contacto->telefono = $request->post('telefono');
        $contacto->email = $request->post('email');
        $contacto->creadoPor =$request->post('creadoPor');
        $contacto->categoria_id = $request->post('categoria');
        $contacto->save();
        return redirect()->route('contactos.inicio')->with('warning', 'Actualizado con exito');
   
        
    }

    public function show($id){
        $contactos = Contactos::find($id);
        return view('contactos/eliminar', compact('contactos'));
    }
    
    public function destroy($id)
    {
        $worldZoo = Contacto::find($id);
        $worldZoo->delete();

        return redirect()->route('contactos.inicio')->with('danger', 'Eliminado con exito!');

    }

    public function store(Request $request)
    {
        
        $contacto = new Contacto();
        $contacto->nombre = $request->post('nombre');
        $contacto->apellidos = $request->post('apellido');
        $contacto->telefono = $request->post('telefono');
        $contacto->email = $request->post('email');
        $contacto->creadoPor =$request->post('creadoPor');
        $contacto->categoria_id = $request->post('categoria');
        $contacto->save();
        return redirect()->route('contactos.inicio')->with('success', 'Agregado con exito');
    }

}
