<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  //Table Name
  protected $table = 'contact_us';
  //Primary Key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;
}

