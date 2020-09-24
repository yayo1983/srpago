<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class DCiudad
 * @package App\Models
 */
class DCiudad extends Model
{
    protected $table = 'd_ciudads';

    protected $fillable = ['id','d_ciudad', 'c_cve_ciudad', 'id_mnpio'];
}
