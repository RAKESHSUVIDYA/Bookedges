<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    /*protected $dates = [
        'tour_package_date_created',
        'tour_package_date_updated',
        'tour_package_date_deleted',
    ];*/

    
}
