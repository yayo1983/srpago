<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class DTipoAsenta
 * @package App\Models
 */
class DTipoAsenta extends Model
{
    protected $table = 'd_tipo_asentas';

    protected $fillable = ['id','d_tipo_asenta', 'c_tipo_asenta'];
}
