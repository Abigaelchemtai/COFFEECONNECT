<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User; // Import User model

class Coffeelisting extends Model
{
    use HasFactory;

    protected $table = 'coffeelistings'; // Explicitly define table name

    protected $fillable = [
        'user_id',
        'coffee_type',
        'quantity',
        'price_per_kg',
        'coffee_grade', // Now restricted to AA, AB, PB
        'status',
        'wallet_number',
    ];


    // ✅ Fix: Relationship - Each coffee listing belongs to a farmer (user)
    public function farmer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
    

    /**
     * Relationship: A coffee listing belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requests()
    {
        return $this->hasMany(ProductRequest::class, 'listing_id');
    }

    public function productRequests()
    {
        return $this->hasMany(ProductRequest::class, 'listing_id');
    }


}
