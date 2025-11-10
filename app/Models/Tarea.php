<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Tarea extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'tareas';

    protected $fillable = ['titulo', 'descripcion', 'completada'];
}
