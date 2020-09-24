<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Asentamiento
 * @package App\Models
 */
class Asentamiento extends Model
{
    protected $table = 'd_asentamientos';

    protected $fillable = ['id','d_codigo', 'd_asenta', 'id_ciudad','id_tipo_asentamiento',
                           'id_zona','id_admin_postal','id_asenta_cpcons'];
}
