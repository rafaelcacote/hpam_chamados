<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;
use App\Models\Tecnico;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_tecnico = $request->search_tecnico;
        $data = Tecnico::where(function ($query) use ($search_tecnico) {
            if ($search_tecnico) {
                $query->where('nome', 'LIKE', "%{$search_tecnico}%");
            }
        })->paginate(5);
        return view('tecnicos.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oficinas = Oficina::pluck('nome', 'id')->all();
        return view('tecnicos.create', \compact('oficinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'matricula' => 'required|unique:tecnicos,matricula',
        ]);

        $input = $request->all();
        $tecnico = Tecnico::create($input);
        $tecnico->oficinas()->sync($request->input('oficinas', []));

        toast('Técnico criado com sucesso', 'success');

        return redirect()->route('tecnicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnico = Tecnico::find($id);
        return view('tecnicos.show', compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        $oficinas = Oficina::all()->pluck('nome', 'id');

        $tecnico->load('oficinas');

        return view('tecnicos.edit', compact('tecnico', 'oficinas'));
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
        $this->validate($request, [
            'nome' => 'required',
            'matricula' => 'required|unique:tecnicos,matricula,' . $id,
        ]);

        $input = $request->all();



        $tecnico = Tecnico::find($id);
        $tecnico['active'] = (!isset($request['status'])) ? 0 : 1;
        $tecnico->update($input);

        $tecnico->oficinas()->sync($request->input('oficinas', []));


        toast('Técnico Editado com sucesso', 'success');

        return redirect()->route('tecnicos.index');
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
    }
}
