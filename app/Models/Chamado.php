<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null; //and updated by default null set
    protected $table = 'chamados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'setor_id',
        'usuario_id',
        'descricao',
        'data_solicitacao',
        'ramal',
        'nome_maquina',
        'oficina_id',
        'ocorrencia_id',
        'tecnico_id',
        'data_entrega_tecnico',
        'data_devolvido_tecnico',
        'descricao_servico_realizado',
        'material_utilizado',
        'avaliacao',
        'impressaostatus',
        'tempo_execucao',
        'data_conclusao'

    ];
}
