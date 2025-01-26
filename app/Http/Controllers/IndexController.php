<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $breakfasts = Food::where('category', 'breakfast')->get();
        $lunches = Food::where('category', 'lunch')->get();
        $dinners = Food::where('category', 'dinner')->get();
        
        return view('index', compact(['breakfasts', 'lunches', 'dinners']));
    }
}
