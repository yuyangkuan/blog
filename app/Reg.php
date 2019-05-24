<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg extends Model
{
    protected $table="reg";
    protected $primaryKey="reg_id";
    protected $fillable = ['reg_name','reg_pass'];
}
