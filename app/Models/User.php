<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
            'password' => 'hashed',
        ];
    }

    /* Penjelasan relasi Eloquent Laravel:
    * - One to Many: gunakan hasMany pada model induk, dan belongsTo pada model anak.
    * Contoh: User memiliki banyak Order -> User::hasMany(Order::class), Order::belongsTo(User::class)
    * - One to One: gunakan hasOne pada model induk, dan belongsTo pada model anak.
    * Contoh: User memiliki satu Profile -> User::hasOne(Profile::class), Profile::belongsTo(User::class)
    * - Many to Many: gunakan belongsToMany pada kedua model.
    * Contoh: User dan Role -> User::belongsToMany(Role::class), Role::belongsToMany(User::class)
    */
}
