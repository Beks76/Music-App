<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'artist', 'year', 'genre_id'

    ];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    public function songs() {
        return $this->hasMany(Song::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
