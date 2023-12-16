<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Teatro;
use Illuminate\Http\Request;

/**
 * Class TeatroController
 * @package App\Http\Controllers
 */
class TeatroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teatros = Teatro::with('ciudad')->withCount('salas')->paginate();
        return view('teatro.index', compact('teatros'))
            ->with('i', (request()->input('page', 1) - 1) * $teatros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teatro = new Teatro();
        $departamentos = Departamento::with('ciudades')->get();
        foreach ($departamentos as $departamento) {
            $list_ciuds = [];
            foreach ($departamento->ciudades as $ciud) {
                $list_ciuds[$ciud->cod_ciudad] = $ciud->nombre_ciu;
            }
            $ciudades[$departamento->nombre_departamento] = $list_ciuds;
        }
        return view('teatro.create', compact('teatro', 'ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Teatro::$rules);

        $teatro = Teatro::create($request->all());

        return redirect()->route('teatros.index')
            ->with('success', 'Teatro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teatro = Teatro::find($id);
        return view('teatro.show', compact('teatro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos = Departamento::with('ciudades')->get();
        foreach ($departamentos as $departamento) {
            $list_ciuds = [];
            foreach ($departamento->ciudades as $ciud) {
                $list_ciuds[$ciud->cod_ciudad] = $ciud->nombre_ciu;
            }
            $ciudades[$departamento->nombre_departamento] = $list_ciuds;
        }
        $teatro = Teatro::find($id);

        return view('teatro.edit', compact('teatro', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Teatro $teatro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teatro $teatro)
    {
        request()->validate(Teatro::$rules);

        $teatro->update($request->all());

        return redirect()->route('teatros.index')
            ->with('success', 'Teatro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $teatro = Teatro::find($id)->delete();

        return redirect()->route('teatros.index')
            ->with('success', 'Teatro deleted successfully');
    }
}
