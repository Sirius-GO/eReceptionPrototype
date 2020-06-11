<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
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
        'company_id', 'status', 'type', 'classification', 
    ];


}