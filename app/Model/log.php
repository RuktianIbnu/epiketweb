<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    protected $table = 'tbl_log';

    protected $fillable = [
    	'user_id',
    	'log',
    	'ip_address'
    ];
}
