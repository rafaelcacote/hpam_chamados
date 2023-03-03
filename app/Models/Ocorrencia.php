<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null; //and updated by default null set
    protected $table = 'ocorrencias';

    protected $fillable = [
        'id',
        'nome',
        'oficina_id',

    ];
}
