<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

}
