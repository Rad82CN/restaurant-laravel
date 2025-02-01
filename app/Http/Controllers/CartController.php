<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($food) {
        // get logged in user by id
        $user = User::find(auth()->id());

        if(Food::findOrFail($food)->users()->where('id', $user->id)->doesntExist()) {
            // catching the food by its id
            $food = Food::findOrFail($food);

            // adding the selected food to users cart
            $user->foods()->attach($food);

            return redirect()->route('cart.index')->with('success', 'Food added to your cart successfully!');
        } else {
            return redirect()->route('foods.show', $food)->with('error', 'Food is already added to cart');
        }
    }

    public function remove($food) {
        // get logged in user by id
        $user = User::find(auth()->id());

        if(Food::findOrFail($food)->users()->where('id', $user->id)->exists()) {
            // catching the food by its id
            $food = Food::findOrFail($food);

            // removing the selected food from users cart
            $user->foods()->detach($food);

            return redirect()->route('cart.index')->with('success', 'Food removed from your cart successfully!');
        } else {
            // we already have the food id for redirecting
            return redirect()->route('foods.show', $food)->with('error', 'Food is doesnt exist in your cart!');
        }
    }

    public function index() {
        // get logged in user by id
        $user = User::find(auth()->id());
        // get foods id of users chosen foods
        $foods_id = $user->foods()->pluck('food_id');
        
        // get foods by id from user_food table
        $foods = Food::whereIn('id', $foods_id)->get();

        $foods_price = $foods->sum('price');

        return view('foods.cart', compact('foods', 'foods_price'));
    }

    public function checkout() {
        // get logged in user by id
        $user = User::find(auth()->id());
        // get foods id of users chosen foods
        $foods_id = $user->foods()->pluck('food_id');
        
        // get foods by id from user_food table
        $foods = Food::whereIn('id', $foods_id)->get();

        // removing the selected food from users cart
        $user->foods()->detach($foods);

        return redirect()->route('cart.index')->with('success', 'Your order was successfully submited and paid for!');
    }
}
