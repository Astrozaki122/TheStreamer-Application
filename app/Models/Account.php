<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;
    
    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tell Laravel to hash passwords automatically
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Tell Auth to use username instead of email
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function videos() {
        return $this->belongsTo(Video::class);
    }
}
