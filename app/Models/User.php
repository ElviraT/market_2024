<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'idPrefix',
        'dni',
        'email',
        'gender_id',
        'movil',
        'brithday',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'avatar',
        'status',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function rol(): BelongsTo
    {
        return $this->belongsTo(ModelHasRole::class, 'id', 'model_id');
    }

    public function Idstatus(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_user', 'id');
    }

    public function imgTicket(): HasMany
    {
        return $this->hasMany(ImgTicket::class, 'id_user', 'id');
    }
}