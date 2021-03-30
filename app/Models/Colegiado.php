<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegiado extends Model
{
    use HasFactory;

    protected $guarded = ['CodColegiado'];
    protected $primaryKey = 'CodColegiado';

    protected $table = 'Colegiado';
}
