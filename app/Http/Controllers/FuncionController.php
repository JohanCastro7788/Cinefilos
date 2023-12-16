<?php

namespace App\Http\Controllers;

use App\Models\Funcion;
use App\Models\Pelicula;
use App\Models\Teatro;
use DateTime;
use Illuminate\Http\Request;

/**
 * Class FuncionController
 * @package App\Http\Controllers
 */
class FuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcions = Funcion::with('pelicula', 'sala')->paginate();

        return view('funcion.index', compact('funcions'))
            ->with('i', (request()->input('page', 1) - 1) * $funcions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcion = new Funcion();
        $peliculas = Pelicula::all();
        // Obtener lista de peliculas
        $list_peliculas = [];
        foreach ($peliculas as $pelicula) {
            $list_peliculas[$pelicula->pelicula_id] = $pelicula->peli_nombre;
        }
        //Obtener lista de teatros y salas
        $teatros = Teatro::with('salas')->get();
        $list_teatros = [];
        foreach ($teatros as $teatro) {
            $list_salas = [];
            foreach ($teatro->salas as $sala) {
                $list_salas[$sala->sala_id] = '00' . $sala->consecutivo;
            }
            $list_teatros[$teatro->teatro_nombre] = $list_salas;
        }
        return view('funcion.create', compact('funcion', 'list_peliculas', 'list_teatros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        request()->validate(Funcion::$rules);
        $date = new DateTime($request->fecha_func);
        $time = new DateTime('1970-01-01 ' . $request->hora_func);
        $date->setTime(
            $time->format('H'),
            $time->format('i'),
            $time->format('s')
        );
        $data['fecha_hora_func'] = $date->format('Y-m-d H:i:s');

        $funcion = Funcion::create($data);

        return redirect()->route('funcions.index')
            ->with('success', 'Funcion Creada Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcion = Funcion::with('pelicula', 'sala')->find($id);

        return view('funcion.show', compact('funcion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcion = Funcion::find($id);
        $funcion->fecha_func = (new DateTime($funcion->fecha_hora_func))->format('Y-m-d');
        $funcion->hora_func = (new DateTime($funcion->fecha_hora_func))->format('H:i:s');
        $peliculas = Pelicula::all();
        // Obtener lista de peliculas
        $list_peliculas = [];
        foreach ($peliculas as $pelicula) {
            $list_peliculas[$pelicula->pelicula_id] = $pelicula->peli_nombre;
        }
        //Obtener lista de teatros y salas
        $teatros = Teatro::with('salas')->get();
        $list_teatros = [];
        foreach ($teatros as $teatro) {
            $list_salas = [];
            foreach ($teatro->salas as $sala) {
                $list_salas[$sala->sala_id] = '00' . $sala->consecutivo;
            }
            $list_teatros[$teatro->teatro_nombre] = $list_salas;
        }
        return view('funcion.edit', compact('funcion', 'list_peliculas', 'list_teatros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Funcion $funcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcion $funcion)
    {
        request()->validate(Funcion::$rules);

        $funcion->update($request->all());

        return redirect()->route('funcions.index')
            ->with('success', 'Funcion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $funcion = Funcion::find($id)->delete();

        return redirect()->route('funcions.index')
            ->with('success', 'Funcion deleted successfully');
    }
}
