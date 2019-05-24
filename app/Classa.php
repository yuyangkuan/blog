<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classa extends Model
{
    protected $table="class";
    protected $primaryKey="class_id";
    protected $guarded = ['_token'];
}
