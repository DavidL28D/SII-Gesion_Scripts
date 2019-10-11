<?php

namespace App\Http\Controllers;

use App\Script;
use App\Language;
use App\Company;
use App\So;
use App\Resource;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $script=Script::orderBy('nombre','ASC')->paginate(10);
        return view('scripts.index',compact('script'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $lenguajes=Language::all(); 
        $empresas=Company::all();
        $sos=So::all();
        $recursos = Resource::all();
        $scripts=Script::all();
        return view('scripts.create', compact('lenguajes', 'empresas', 'sos', 'recursos', 'scripts'));
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
            'descripcion' => 'required',
            'permisos' => 'required',
            'creacion' => 'required',
            'lenguaje_id' => 'required',
            'so_id' => 'required'
        ]);

        $s = Script::create($request->all());
        $s->sos()->attach($s->so_id);
        if($s->recurso_id != null){
            $s->resources()->attach($s->recurso_id);
        }
        return redirect()->route('scripts.index')->with('success','Script Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function show(Script $script)
    {   
        $sos = So::find($script->so_id);
        $language = Language::find($script->lenguaje_id);

        if($script->recurso_id != null){
            $resources = Resource::find($script->recurso_id);
        }else{
            $resources = null;
        }

        if($script->empresa_id != null){
            $company = Company::find($script->empresa_id);
        }else{
            $company = null;
        }
        
        return view('scripts.show', compact('script', 'sos', 'language', 'resources', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function edit(Script $script)
    {
        return view('scripts.edit',compact('script'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Script $script)
    {
        $request->validate([
            'nombre' => 'required',
            'descipcion' => 'required',
            'permisos' => 'required',
            'creacion' => 'required',
            'lenguaje_id' => 'required',
            'so_id' => 'required'
        ]);
  
        $script->update($request->all());
        return redirect()->route('scripts.index')->with('success','Script Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Script  $script
     * @return \Illuminate\Http\Response
     */
    public function destroy(Script $script)
    {   
        $script->sos()->detach();
        $script->delete();
        return redirect()->route('scripts.index')->with('success','Script Eliminado');
    }
}
