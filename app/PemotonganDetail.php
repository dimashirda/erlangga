<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemotonganDetail extends Model
{
    protected $table = 'pemotongan_detail';
    use SoftDeletes;
}
