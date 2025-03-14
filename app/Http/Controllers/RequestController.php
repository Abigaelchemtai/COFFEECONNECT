<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffeelisting;
use App\Models\User;
use App\Models\ProductRequest;
use Auth;

class RequestController extends Controller
{
    public function requestProduct(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to make a request.');
        }

        $listing = Coffeelisting::findOrFail($request->listing_id);
        $investor = Auth::user(); // Logged-in investor

        // Save request using Eloquent
        ProductRequest::create([
            'investor_id' => $investor->id,
            'farmer_id' => $listing->user_id,
            'listing_id' => $request->listing_id,
            'status' => 'pending',
            'coffee_type' => $listing->coffee_type, 
            'coffee_grade' => $listing->coffee_grade, 
        ]);

        // ✅ Return a success message
        return redirect()->back()->with('success', 'Product request sent successfully.');
    }
    
    public function showRequests()
    {
        $investorId = Auth::id(); // Get the logged-in investor's ID
    
        $requests = ProductRequest::select(
            'product_requests.*',
            'coffeelistings.coffee_type', 
            'coffeelistings.coffee_grade', 
            'users.FirstName as farmer_name'
        )
        ->join('coffeelistings', 'product_requests.listing_id', '=', 'coffeelistings.id')
        ->join('users', 'product_requests.farmer_id', '=', 'users.id')
        ->where('product_requests.investor_id', 2)
        ->get();
            
        return view('requests.index', compact('requests'));
    }

    
    public function updateRequest(Request $request, $id)
    {
        $requestStatus = $request->input('status');
    
        \DB::table('product_requests')
            ->where('id', $id)
            ->update(['status' => $requestStatus]);
    
        return redirect()->back()->with('success', 'Request updated successfully!');
    }
    
}
