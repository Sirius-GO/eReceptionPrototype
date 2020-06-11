<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //Table Name
    protected $table = 'locations';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'company_id', 'location_name', 'location_address', 'location_code', 
    ];


}
