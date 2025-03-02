<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmersDashboardController extends Controller
{
    public function farmers()
{
    return view('pages.farmers');
}
}
