<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oficina;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_oficina = strtoupper($request->search_oficina);
        $data = Oficina::where(function ($query) use ($search_oficina) {
            if ($search_oficina) {
                $query->where('nome', 'LIKE', "%{$search_oficina}%");
                dd($search_oficina);
            }
        })->paginate(5);
        return view('oficinas.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oficinas.create');
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
            'nome' => 'required|unique:tecnicos,matricula',
        ]);

        $input = $request->all();
        $oficina = Oficina::create($input);
        //$user->assignRole($request->input('roles'));

        //$user->setores()->sync($setores);

        toast('Oficina criada com sucesso', 'success');

        return redirect()->route('oficinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oficina = Oficina::find($id);
        return view('oficinas.show', compact('oficina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficina $oficina)
    {
        return view('oficinas.edit', compact('oficina'));
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
            'nome' => 'required|unique:tecnicos,matricula,' . $id,
        ]);

        $input = $request->all();

        $oficina = Oficina::find($id);
        $oficina->update($input);


        toast('Oficina Editada com sucesso', 'success');

        return redirect()->route('oficinas.index');
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
