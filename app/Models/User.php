<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            //'password' => 'hashed',
        ];
    }


    public function thought(){

        return $this->hasMany(Thoughts::class)->latest();
    }

    public function comments(){

        return $this->hasMany(comment::class)->latest();
    }

    public function followings(){
        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id')->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(User::class,'follower_user','user_id','follower_id')->withTimestamps();
    }

    public function follows(User $user){
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    public function likes(){
        return $this->belongsToMany(Thoughts::class, 'Thought_like', 'user_id', 'Thought_id')->withTimestamps();
    }


    public function likesThoughts(Thoughts $Thought){
        return $this->likes()->where('Thought_id', $Thought->id)->exists();
    }


    public function getImageURL(){

        if($this->image){

            return url('storage/' . $this->image);
        }

        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $this->image }}";
    }
}
