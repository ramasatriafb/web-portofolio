<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	protected $table = 'experience';

    protected $fillable = [
        'profesi','tahun','perusahaan','deskripsi'
    ];
}
