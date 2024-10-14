<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'note'; // Pokud je název tabulky jiný

    protected $fillable = ['shortNote', 'longNote'];

    // Pokud potřebuješ převody typů
    protected $casts = [
        'id' => 'integer',
        // Další převody podle potřeby
    ];
}
