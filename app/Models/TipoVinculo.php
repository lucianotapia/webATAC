<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVinculo extends Model
{
    use HasFactory;

    protected $guarded = ['CodTipoVinculo'];
    protected $primaryKey = 'CodTipoVinculo';

    protected $table = 'TipoVinculo';
}
