<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
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

    /**
     * Relasi dengan Pesanan
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'user_id', 'id');
    }

    /**
     * Cek apakah user adalah admin
     * 
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Cek apakah user adalah customer
     * 
     * @return bool
     */
    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    /**
     * Scope untuk filter user berdasarkan role
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $role
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    /**
     * Scope untuk filter user yang aktif (belum dihapus)
     */
    public function scopeActive($query)
    {
        return $query->where('deleted_at', null);
    }

    /**
     * Accessor untuk mendapatkan nama role yang diformat
     */
    public function getRoleLabelAttribute()
    {
        return [
            'admin' => 'Administrator',
            'customer' => 'Customer',
        ][$this->role] ?? ucfirst($this->role);
    }

    /**
     * Accessor untuk mendapatkan inisial nama
     */
    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->name);
        $initials = '';
        foreach ($words as $word) {
            $initials .= strtoupper($word[0]);
        }
        return $initials;
    }
}