<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specijalizacija extends Model
{
    use HasFactory;

    protected $fillable = ['naziv'];

    protected $table = 'specijalizacije';
}
