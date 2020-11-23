<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //Table Name
    protected $table = 'registers';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
