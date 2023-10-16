<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

use ConsoleTVs\Charts\Facades\Charts;


class ChartController extends Controller
{
    public function index(){
        $data = Contactos::select('categoriaContacto as categoria', DB::raw('count(*) as total'))
        ->groupBy('categoriaContacto')->get();
        // $data = DB::table('dataagenda')->select('categoriaContacto', DB::raw('COUNT(*) as total'))->groupBy('categoriaContacto')->get();


        $labels = $data->pluck('categoria')->toArray();
        $values = $data->pluck('total')->toArray();
        $colors = ['#FF5733', '#33FF57', '#5733FF', '#FF3357', '#33FF33'];

        return view('grafica', compact('labels', 'values', 'colors'));
    
    }

    
    public function pieChart()
{
    // Obtén los datos de la tabla SQL según la selección del campo
    $user = Auth::user();
    $userID = $user->id;
    $categorias = Contactos::select('categoriaContacto', DB::raw('count(*) as total'))->where('creadoPor', '=', $userID)
        ->groupBy('categoriaContacto')
        ->get();

    $data = [];

    foreach ($categorias as $categoria){
        $data['label'][] = $categoria->categoriaContacto;
        $data['data'][] = $categoria->total;
    }


    $data['data'] = json_encode($data);

    return view('grafica', $data);
}

public function showChart()
{
    // $data = DB::table('dataagenda')->select('categoriaContacto', DB::raw('COUNT(*) as total'))->groupBy('categoriaContacto')->get();
    // $chart = new Charts;
    // $chart = Charts::database($data, 'pie', 'chartjs')
    //     ->title('Gráfica de Pastel')
    //     ->elementLabel('Elemento')
    //     ->dimensions(500, 300)
    //     ->responsive(true);

    // return view('chart', compact('chart'));
}
}
