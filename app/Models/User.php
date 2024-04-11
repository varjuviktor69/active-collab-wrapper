<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use ActiveCollab\SDK\TokenInterface;
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
        'active_collab_token',
        'logged_user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'active_collab_token',
        'logged_user_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //
        ];
    }

    public function getActiveCollabToken(): TokenInterface
    {
        return $this->active_collab_token;
    }

    public function getLoggedUserId(): int
    {
        return $this->logged_user_id;
    }
}
