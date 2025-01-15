<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recipeAttr = $request->validate([
            'name' => ['required'],
            'steps' => ['required', 'min:100'],
            'category' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,tif']
        ]);

        $imagePath = $request->file('image')->store('food_images');
        $recipeAttr['image'] = $imagePath;

        $request->user()->recipes()->create($recipeAttr);
        return redirect(route('recipes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        Gate::authorize('update', $recipe);
        return view('recipes.edit', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        // Gate::authorize('update', $recipe);


        // $updated = request()->validate([
        //     'name' => ['required'],
        //     'steps' => ['required', 'min:50'],
        //     'category' => ['required'],
        //     'image' => ['required', File::types(['jpg', 'jpeg', 'tif', 'png'])]
        // ]);

        // $imagePath = $request->file('image')->store('food_images');
        // $recipeAttr['image'] = $imagePath;

        // $recipe->update($updated);

        // return redirect("/recipes/$recipe->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        Gate::authorize('delete', $recipe);

        $recipe->delete();
        return redirect('/recipes');
    }
}
