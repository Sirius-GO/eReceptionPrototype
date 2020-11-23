<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireDrill extends Model
{
    //Table Name
    protected $table = 'fire_drills';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
