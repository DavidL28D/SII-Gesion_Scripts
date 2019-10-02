<?php

namespace App\Http\Controllers;

use App\So;
use Illuminate\Http\Request;

class SoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $so=So::orderBy('nombre','ASC')->paginate(10);
        return view('sos.index',compact('so'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'version' => 'required',
            'compilacion' => 'required'
        ]);
        So::create($request->all());
        return redirect()->route('sos.index')->with('success','Sistema Operativo Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\So  $so
     * @return \Illuminate\Http\Response
     */
    public function show(So $so)
    {
        return view('sos.show',compact('so'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\So  $so
     * @return \Illuminate\Http\Response
     */
    public function edit(So $so)
    {
        return view('sos.edit',compact('so'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\So  $so
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, So $so)
    {
        $request->validate([
            'nombre' => 'required',
            'version' => 'required',
            'compilacion' => 'required'
        ]);
        $so->update($request->all());
        return redirect()->route('sos.index')->with('success','Sistema Operativo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\So  $so
     * @return \Illuminate\Http\Response
     */
    public function destroy(So $so)
    {
        $so->delete();
        return redirect()->route('sos.index')->with('success','Sistema Operatico Eliminado');
    }
}
