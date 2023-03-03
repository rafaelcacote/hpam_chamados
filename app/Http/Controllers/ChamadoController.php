<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;
use App\Models\Oficina;
use App\Models\Ocorrencia;
use App\Models\Chamado;
use App\Models\Status_chamado;
use Illuminate\Support\Facades\Auth;

class ChamadoController extends Controller
{
    public function novos_chamados(Request $request)
    {
        $setores = Setor::all();
        $oficinas = Oficina::all();

        return view('chamados.novos_chamados', compact('setores', 'oficinas'));
    }

    public function novos_chamados_store(Request $request)
    {
        $this->validate($request, [
        'ramal' => 'required',
        'setor_id' => 'required',
        'oficina_id' => 'required',
        'ocorrencia_id' => 'required',
        'descricao' => 'required',
    ]);

        $chamado =  new Chamado();
        $chamado->usuario_id = Auth::user()->id;
        $chamado->ramal = $request['ramal'];
        $chamado->setor_id = $request['setor_id'];
        $chamado->oficina_id = $request['oficina_id'];
        $chamado->ocorrencia_id = $request['ocorrencia_id'];
        $chamado->descricao = $request['descricao'];
        //dd($chamado);
        //$chamado->save();

        $chamado_status =  new Status_chamado();
        $chamado_status->usuario_id = Auth::user()->id;
        $chamado_status->chamado_id = $chamado->id;
        $chamado_status->status = 'AGUARDANDO';
        $chamado_status->data = date('Y-m-d H:i:s');
        $chamado_status->hora = $request['ocorrencia_id'];
        dd($chamado_status);
        $chamado_status->save();

    //$input = $request->all();
    //dd($input);
    //$chamado = chamado::create($input);


    toast('Chamado Criado com sucesso criado com sucesso', 'success');

    return redirect()->route('chamados.novos_chamados');

    }

    public function get_ocorrencias(Request $request)
    {
        if (!$request->oficina_id) {
        } else {
            $html = '';
            $ocorrencias = Ocorrencia::where('oficina_id', $request->oficina_id)->get();
            foreach ($ocorrencias as $id => $ocorrencias) {
                $html .= '<option value="' . $ocorrencias->id . '">' . $ocorrencias->nome . '</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

}
