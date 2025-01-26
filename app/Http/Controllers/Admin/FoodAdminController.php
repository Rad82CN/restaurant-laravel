<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodAdminController extends Controller
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

    public function edit($food) {
        $food = Food::findOrFail($food);

        return view('admin.foods-admins.edit-foods', compact('food'));
    }

    public function update(FoodUpdateRequest $request, $food) {
        $food = Food::findOrFail($food);

        $validated = $request->validated();

        if($request->has('image')) {
            if($food->getImageURL() == url('storage/foods/image-not-availible.jpeg')) {
                $imagePath = $request->file('image')->store('foods', 'public');
                $validated['image'] = $imagePath;
            } else {
                $imagePath = $request->file('image')->store('foods', 'public');
                $validated['image'] = $imagePath;

                Storage::disk('public')->delete($food->image ?? '');
            }
        }

        $food->update($validated);

        return redirect()->route('adminFoods.index')->with('success', 'Food has been updated successfully!');
    }

    public function destroy($food) {
        // getting the food that matches the id we are passing
        $food = Food::findOrFail($food);

        if($food->getImageURL() !== url('storage/foods/image-not-availible.jpeg')) {
            Storage::disk('public')->delete($food->image ?? '');
        }

        $food->delete();

        return redirect()->route('adminFoods.index')->with('success', 'Food has been deleted successfully!');
    }
}
