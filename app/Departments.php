<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //Table Name
    protected $table = 'departments';
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
        'user_id', 'company_id', 'department_name',
    ];

}
