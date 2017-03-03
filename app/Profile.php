<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profiles';

    protected $fillable = [
        'name', 'job_title','sex','address','photo'
    ];
}
