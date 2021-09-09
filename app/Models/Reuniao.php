<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\Colegiado;

class Reuniao extends Model
{
    use HasFactory;

    protected $guarded = ['Codigo'];
    protected $primaryKey = 'Codigo';

    protected $table = 'Reuniao';

    protected $appends = ['FilePauta','FileAta', 'FileAnexo0', 'FileAnexo1', 'FileAnexo2', 'FileAnexo3', 'FileAnexo4'];

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

    public function getFilePautaAttribute() {        
        $nomearquivo = $this->NomeArquivo("pauta");
        return $nomearquivo;
    }
    
    public function getFileAtaAttribute() {        
        $nomearquivo = $this->NomeArquivo("ata");
        return $nomearquivo;
    }

    public function getFileAnexo0Attribute() {        
        $nomearquivo = $this->NomeArquivo("anexo0");
        return $nomearquivo;
    }

    public function getFileAnexo1Attribute() {        
        $nomearquivo = $this->NomeArquivo("anexo1");
        return $nomearquivo;
    }

    public function getFileAnexo2Attribute() {
        $nomearquivo = $this->NomeArquivo("anexo2");
        return $nomearquivo;
    }

    public function getFileAnexo3Attribute() {
        $nomearquivo = $this->NomeArquivo("anexo3");
        return $nomearquivo;
    }

    public function getFileAnexo4Attribute() {
        $nomearquivo = $this->NomeArquivo("anexo4");
        return $nomearquivo;
    }

    public function NomeArquivo($tipo) {
        
        if (isset($this->attributes['Codigo'])) {            
            $nomearquivo = $this->attributes['Codigo'] . $tipo;
            $nomearquivo = md5($nomearquivo) . ".pdf";;
            if (Storage::exists("pdfs/" . $nomearquivo))
                $nomearquivo = $nomearquivo;
            else
                $nomearquivo = '';
        }       
        return $nomearquivo;
    }
  
}