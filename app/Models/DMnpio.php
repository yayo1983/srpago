<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class DMnpio
 * @package App\Models
 */
class DMnpio extends Model
{
    protected $table = 'd_mnpios';

    protected $fillable = ['id','d_mnpio', 'c_mnpio', 'd_estados_id'];
}
