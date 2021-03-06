<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class street extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'streets';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['street', 'city', 'status', 'zip_code'];

    
}
