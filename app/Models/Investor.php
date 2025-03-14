<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    // ✅ Fix: Relationship - Investors can invest in multiple coffee listings
    public function coffeeListings(): BelongsToMany
    {
        return $this->belongsToMany(Coffeelisting::class, 'investor_coffee', 'investor_id', 'coffee_id');
        // 'investor_coffee' is the pivot table storing investor-coffee relationships
    }
}
