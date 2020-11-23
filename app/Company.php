<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    //Table Name
    protected $table = 'companies';
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
        'company_name', 'company_logo', 'ho_address', 'company_number', 'vat_number',
    ];
}
