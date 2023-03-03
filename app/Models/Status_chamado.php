<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_chamado extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null; //and updated by default null set
    protected $table = 'status_chamado';

    protected $fillable = [
        'id',
        'chamado_id',
        'status',
        'data',
        'hora',
        'usuario_id',
        'observacao',

    ];
}
