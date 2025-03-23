<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopItem;

class ShopController extends Controller
{
    // Show all shop items
    public function index()
    {
        $shopItems = ShopItem::all();
        return view('pages.shop', compact('shopItems'));
    }

    // Show details of a single item
    public function show($id)
    {
        $item = ShopItem::findOrFail($id);
        return view('pages.shop-details', compact('item'));
    }
}

