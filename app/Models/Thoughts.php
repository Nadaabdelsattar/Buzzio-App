<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thoughts extends Model
{
    use HasFactory;

    protected $with = ['user' , 'comments.user'];

    protected $fillable = [
        'user_id',
        'content',
    ];

    public function comments(){

        return $this->hasMany(comment::class, 'Thought_id');

    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'Thought_like', 'Thought_id', 'user_id')->withTimestamps();
    }


}
