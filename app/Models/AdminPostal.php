<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class AdminPostal
 * @package App\Models
 */
class AdminPostal extends Model
{
    protected $table = 'd_admin_postals';

    protected $fillable = ['id','d_cp', 'c_oficina', 'c_cp'];
}
