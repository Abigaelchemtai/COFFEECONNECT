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
    

    /**
     * Relationship: A coffee listing belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
