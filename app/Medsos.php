<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medsos extends Model
{
	protected $table = 'medsos';

    protected $fillable = [
        'icon_id', 'social_media','link'
    ];

    public function icon()
	{
		return $this->belongsTo('App\Icon');
	}
}
