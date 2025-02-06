<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'id',
        'docente_id',
        'insignia'
    ];

    public static $filterColumns = ['insignia'];

    public function competencias() : BelongsToMany{
        return $this->belongsToMany(Competencia::class, 'competencias_actividades', 'actividad_id', 'competencia_id');
    }
}
