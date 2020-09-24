<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class DEstado
 * @package App\Models
 */
class DEstado extends Model
{
    protected $table = 'd_estados';

    protected $fillable = ['id','c_estado','d_estado'];
}
