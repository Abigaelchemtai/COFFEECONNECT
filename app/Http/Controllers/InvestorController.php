<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class InvestorController extends Controller
{
    // public function investor()
    // {
    //     return view('pages.investors');
    // }

    public function investor()
    {
        $farmers = User::where('role', 'farmer')->get(); // Ensure $farmers is always passed
        return view('pages.investors', compact('farmers'));
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'investor') {
            return view('investors.index', ['investor' => Auth::user()]);
        }

        return redirect('/')->with('error', 'Unauthorized access.');
    }

    // NEW FUNCTION FOR FILTERING FARMERS

    public function filterFarmers(Request $request)
    {
        $query = User::where('role', 'farmer')
            ->join('coffeelistings', 'users.id', '=', 'coffeelistings.user_id')
            ->select('users.*', 'coffeelistings.coffee_type', 'coffeelistings.coffee_grade');
    
        if ($request->filled('coffeetype')) {
            $query->where('coffeelistings.coffee_type', $request->coffeetype);
        }
    
        if ($request->filled('coffeegrade')) {
            $query->where('coffeelistings.coffee_grade', $request->coffeegrade);
        }
    
        $farmers = $query->get();
    
        return view('pages.investors', compact('farmers'));
    }
    

}
