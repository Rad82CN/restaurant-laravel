<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodStoreRequest;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::all();
        
        return view('admin.foods-admins.show-foods', compact('foods'));
    }
    
    public function create() {
        return view('admin.foods-admins.create-foods');
    }

    public function store(FoodStoreRequest $request) {
        $validated = $request->validated();

        if($request->has('image')) {
            $imagePath = $request->file('image')->store('foods', 'public');
            $validated['image'] = $imagePath;
        }

        Food::create($validated);

        return redirect()->route('adminFoods.index')->with('success', 'Food has been created successfully!');
    }

    public function show() {
        //
    }

    public function edit() {
        //
    }

    public function update() {
        //
    }

    public function destroy(Food $food) {
        $food->delete();

        return redirect()->route('adminFoods.index')->with('success', 'Food has been deleted successfully!');
    }
}