<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ropa extends Model
{
    use HasFactory;

    protected $table = 'ropa';

    protected $fillable = [
        'nombre',
        'marca',
        'talla',
        'color',
        'precio',
        'existencia',
        'estado',
        'updated_at',
        'created_at'
    ];
}