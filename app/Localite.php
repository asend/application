<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    protected $table='localites';
    protected $fillable=[ 'name', 'type', 'parent_id'];

    /**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function users() 
	{
	  return $this->hasMany('App\User');
	}
}
