<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','website_id'];
    
    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\PostObserver);
    }
    public function website(){
        return $this->belongsTo(Website::class);
    }
}
