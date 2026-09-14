<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $totalCategories = Category::count();

        $totalAssetValue = Item::sum(\Illuminate\Support\Facades\DB::raw('stock * price'));

        $stockPerCategory = Category::withSum('items', 'stock')->get();

        return view('home.index', compact(
            'totalItems',
            'totalCategories',
            'totalAssetValue',
            'stockPerCategory'
        ));
    }
}
