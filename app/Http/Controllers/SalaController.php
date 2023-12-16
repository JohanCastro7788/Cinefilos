<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Teatro;
use Illuminate\Http\Request;

/**
 * Class SalaController
 * @package App\Http\Controllers
 */
class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $salas = Sala::where('teatro_id', $id)->withCount('sillas')->paginate();
        $teatro = Teatro::find($id);
        return view('sala.index', compact('salas', 'teatro'))
            ->with('i', (request()->input('page', 1) - 1) * $salas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sala = new Sala();
        $total = Sala::where('teatro_id', $id)->count();
        $sala->consecutivo = $total + 1;
        $teatro = Teatro::find($id);
        return view('sala.create', compact('sala', 'teatro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sala::$rules);

        $sala = Sala::create($request->all());

        return redirect()->route('salas.bind', $request->teatro_id)
            ->with('success', 'Sala created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sala = Sala::with('teatro')->find($id);
        $teatro = Teatro::find($sala->sala_id);
        return view('sala.show', compact('sala', 'teatro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::with('teatro')->find($id);
        $teatro = Teatro::find($sala->teatro_id);
        return view('sala.edit', compact('sala', 'teatro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sala $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sala $sala)
    {
        request()->validate(Sala::$rules);

        $sala->update($request->all());
        return redirect()->route('salas.bind', $request->teatro_id)
            ->with('success', 'Sala updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sala = Sala::find($id);
        $teatro_id = $sala->teatro_id;
        $sala->delete();

        return redirect()->route('salas.bind', $teatro_id)
            ->with('success', 'Sala deleted successfully');
    }
}
