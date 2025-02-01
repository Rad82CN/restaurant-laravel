<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index() {
        $breakfasts = Food::where('category', 'breakfast')->get();
        $lunches = Food::where('category', 'lunch')->get();
        $dinners = Food::where('category', 'dinner')->get();
        
        return view('foods.menu', compact(['breakfasts', 'lunches', 'dinners']));
    }

    public function show($food) {
        $food = Food::findOrFail($food);

        return view('foods.show-food-cart', [
            'food' => $food,
        ]);
    }
}