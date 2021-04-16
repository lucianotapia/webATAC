<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    protected $guarded = ['CodMembro'];
    protected $primaryKey = 'CodMembro';

    protected $table = 'Membro';
}
