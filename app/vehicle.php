<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehicles';

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
    protected $fillable = ['Brand', 'Series', 'Color', 'Year', 'Mileage', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
 
}
