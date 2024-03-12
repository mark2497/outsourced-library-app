<?php

namespace App\Models;

use App\Models\BookHistory;
use App\Models\Library;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'library',
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
    ];

    /**
     * Relationship to Library
     * This returns library where the user is belong
     * @return BelongsTo
     */
    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    /**
     * Relationship to Book History
     * This returns borrow history of the book that relates to user
     * @return BelongsTo
     */
    public function history(): HasMany
    {
        return $this->hasMany(BookHistory::class);
    }
}
