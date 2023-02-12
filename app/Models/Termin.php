<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    use HasFactory;

    protected $fillable = ['pacijent', 'brojKnjizice', 'lekarID', 'vreme'];

    protected $table = 'termini';
}
