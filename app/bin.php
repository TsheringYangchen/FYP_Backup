<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    protected $table='bins';
    protected $fillable=['license_no', 'license_name', 'cid', 'image'];
    
}
