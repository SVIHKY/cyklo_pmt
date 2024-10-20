<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    // Nastav správnou tabulku, pokud se jmenuje "editoros"
    protected $table = 'database';

    // Definuj povolené atributy pro hromadné přiřazení
    protected $fillable = ['editoros'];  // Tady je název sloupce
}
