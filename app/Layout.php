<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    //Table Name
    protected $table = 'layouts';
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
        'company_id', 'hue', 'sat', 'hue_pass', 'sat_pass', 'hue_vis', 'sat_vis', 'welcome_col', 'welcome_stroke', 'welcome_stroke_col', 'choice', 'bg_image', 'bg_colour', 
    ];

}

