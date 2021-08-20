<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\Models\Colegiado;

class Reuniao extends Model
{
    use HasFactory;

    protected $guarded = ['Codigo'];
    protected $primaryKey = 'Codigo';

    protected $table = 'Reuniao';

    public static function colegiados()
    {
        $colegiados = Colegiado::OrderBy("Colegiado")->get();
        return $colegiados;
    }

    public function setDataAttribute($value) {
        $this->attributes['data'] = Carbon::createFromFormat('d/m/Y H:i:s', $value);
    }

    public function getDataAttribute($value) {
        if($value)
            //return Carbon::CreateFromFormat('Y-m-d', $value)->format('d/m/Y');
            return date("d/m/Y H:i:s", strtotime($value));
    }    
}