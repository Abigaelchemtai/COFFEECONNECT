<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import User model

class Coffeelisting extends Model
{
    use HasFactory;

    protected $table = 'coffeelistings'; // Explicitly define table name

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'stock_quantity',
        'status'
    ];

    /**
     * Relationship: A coffee listing belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Automatically update status when stock changes
     */
    public function updateStatus()
    {
        $this->status = $this->stock_quantity > 0 ? 'available' : 'sold_out';
        $this->save();
    }
}
