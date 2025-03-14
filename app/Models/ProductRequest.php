<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $table = 'product_requests';

    protected $fillable = [
        'investor_id',
        'farmer_id',
        'listing_id',
        'status',
        'coffee_type', 
        'coffee_grade',       
    ];
    

    // Relationship with Investor
    public function investor()
    {
        return $this->belongsTo(User::class, 'investor_id');
    }

    // Relationship with Farmer
    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }

    // Relationship with Coffee Listing
    public function listing()
    {
        return $this->belongsTo(CoffeeListing::class, 'listing_id');
    }
    
}
