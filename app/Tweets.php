<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tweets extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'tweets';
    protected $primaryKey = '_id';
    public $incrementing = 'false';
    protected $keyType = 'ObjectId';

//     public function user() {
//         return $this->belongsTo('App\User') ;
//     }
}