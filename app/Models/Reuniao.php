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

    public function UploadReuniao($id, $request) {
        if ($request->hasFile('pauta')) {
            $nomearq = md5($id . 'pauta') . "." . $request->file('pauta')->extension();
            $request->file('pauta')->storeAs('', $nomearq);
        }

        if ($request->hasFile('ata')) {
            $nomearq = md5($id . 'ata') . "." . $request->file('ata')->extension();
            $request->file('ata')->storeAs('', $nomearq);
        }

        if ($request->hasFile('anexo0')) {
            $nomearq = md5($id . 'anexo0') . "." . $request->file('anexo0')->extension();
            $request->file('anexo0')->storeAs('', $nomearq);
        }

        if ($request->hasFile('anexo1')) {
            $nomearq = md5($id . 'anexo1') . "." . $request->file('anexo1')->extension();
            $request->file('anexo1')->storeAs('', $nomearq);
        }

        if ($request->hasFile('anexo2')) {
            $nomearq = md5($id . 'anexo2') . "." . $request->file('anexo2')->extension();
            $request->file('anexo2')->storeAs('', $nomearq);
        }

        if ($request->hasFile('anexo3')) {
            $nomearq = md5($id . 'anexo3') . "." . $request->file('anexo3')->extension();
            $request->file('anexo3')->storeAs('', $nomearq);
        }

        if ($request->hasFile('anexo4')) {
            $nomearq = md5($id . 'anexo4') . "." . $request->file('anexo4')->extension();
            $request->file('anexo4')->storeAs('', $nomearq);
        }
        return true;
    }
}