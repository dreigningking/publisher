<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Website extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class,'subscribers');
    }
}
