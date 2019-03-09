<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemotongan extends Model
{
    protected $table = 'pemotongan';
    use SoftDeletes;
}
