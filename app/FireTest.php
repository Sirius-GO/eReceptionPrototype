<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireTest extends Model
{
    //Table Name
    protected $table = 'fire_tests';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
