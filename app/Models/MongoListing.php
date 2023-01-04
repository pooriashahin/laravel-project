<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MongoListing extends Model
{

    protected $connection = 'mongodb';
    protected $collection = 'listings';

    protected $fillable = ['title', 'company', 'location', 'email', 'website', 'tags', 'description', 'logo', 'user_id', 'listing_id'];

    public function scopeFilter ($query, array $filters) {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('tags', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }

    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
