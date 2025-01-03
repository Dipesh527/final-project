<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    use HasFactory;
    public function upvotes():HasMany
    {
        return $this->hasMany(Upvote::class);
    }
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function user():HasMany
    {
        return $this->hasMany(User::class);
    }
}
