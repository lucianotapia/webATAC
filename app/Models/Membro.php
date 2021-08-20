<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Membro extends Model
{
    use HasFactory;

    protected $guarded = ['CodMembro'];
    protected $primaryKey = 'CodMembro';

    protected $table = 'Membro';

    public function setInicioAttribute($value) {
        $this->attributes['inicio'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function getInicioAttribute($value) {
        if($value)
        //     return Carbon::CreateFromFormat('Y-m-d', $value)->format('d/m/Y');        
            return date("d/m/Y", strtotime($value));
    }

    public function setFimAttribute($value) {
        $this->attributes['fim'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function getFimAttribute($value) {
        if($value)
            return date("d/m/Y", strtotime($value));
    //      return Carbon::CreateFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

}
