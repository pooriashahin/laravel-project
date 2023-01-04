<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MongoProduct extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'devices';

    protected $fillable = [
        'slug',
        'description',
        'price',
    ];
}
