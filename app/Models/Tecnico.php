<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null; //and updated by default null set
    protected $table = 'tecnicos';

    protected $fillable = [
        'id',
        'nome',
        'matricula',
        'active',

    ];

    public function oficinas()
    {
        return $this->belongsToMany(Oficina::class, 'oficinas_has_tecnicos', 'tecnico_id', 'oficina_id');
    }
}
