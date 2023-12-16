<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Silla;
use Illuminate\Http\Request;

/**
 * Class SillaController
 * @package App\Http\Controllers
 */
class SillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sillas = Silla::where('sala_id', $id)->paginate();
        $sala = Sala::where('sala_id', $id)->first();
        return view('silla.index', compact('sillas', 'sala'))
            ->with('i', (request()->input('page', 1) - 1) * $sillas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $silla = new Silla();
        $sala = Sala::find($id);
        $opcionMultiple = true;
        return view('silla.create', compact('silla', 'sala', 'opcionMultiple'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Silla::$rules);
        $data = $request->all();
        for ($i = 0; $i <= $request->cantidad_derecha; $i++) {
            $data['concecutivo'] = $data['columna'] . $data['numero'];
            $silla = Silla::create($data);
            $data['numero'] = $data['numero'] + 1;
        }
        return redirect()->route('sillas.bind', $request->sala_id)
            ->with('success', 'Sillas Creadas exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $silla = Silla::with('sala')->find($id);

        return view('silla.show', compact('silla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $silla = Silla::find($id);
        $sala = Sala::find($silla->sala_id);
        $opcionMultiple = false;
        return view('silla.edit', compact('silla', 'sala', 'opcionMultiple'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Silla $silla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Silla $silla)
    {
        request()->validate(Silla::$rules);

        $silla->update($request->all());

        return redirect()->route('sillas.bind', $request->sala_id)
            ->with('success', 'Silla updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $silla = Silla::find($id);
        $sala = $silla->sala_id;
        $silla->delete();

        return redirect()->route('sillas.bind', $sala)
            ->with('success', 'Silla deleted successfully');
    }
}
