<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $fecha = 'd-m-y';
}
