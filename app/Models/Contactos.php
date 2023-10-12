<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    //public $timestamps = true;
    protected $table = 'dataagenda';
    protected $primaryKey = 'idContacto';
}
