<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'UserName',
        'FirstName',
        'LastName',
        'Role',
        'Email',
        'Password',
    ];

    protected $hidden = [
        'Password',
    ];

    // ✅ Fix: Relationship - A farmer (user) has many coffee listings
    public function coffeeListings(): HasMany
    {
        return $this->hasMany(Coffeelisting::class, 'user_id'); 
    }

    // An investor's requests
    public function sentRequests()
    {
        return $this->hasMany(ProductRequest::class, 'investor_id');
    }

    // A farmer's received requests
    public function receivedRequests()
    {
        return $this->hasMany(ProductRequest::class, 'farmer_id');
    }



}
