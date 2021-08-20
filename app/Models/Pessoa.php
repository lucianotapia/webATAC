<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $guarded = ['codpes'];
    protected $primaryKey = 'codpes';

    protected $table = 'pessoa';

}
