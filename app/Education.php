<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $table = 'educations';

    protected $fillable = [
        'institusi','tahun','gelar','deskripsi'
    ];
}
