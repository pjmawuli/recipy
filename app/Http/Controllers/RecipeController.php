<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

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
        Gate::authorize('update', $recipe);
        try {
            $validated = $request->validate([
                'name' => ['required', 'min:5', 'string'],
                'category' => ['required', 'min:5', 'string'],
                'steps' => ['required', 'min:50', 'string'],
                'image' => ['nullable', File::types(['jpg', 'jpeg', 'tif', 'png'])]
            ]);

            // Start with the validated data
            $updated = [
                'name' => $validated['name'],
                'category' => $validated['category'],
                'steps' => $validated['steps']
            ];

            // Handle image separately
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('food_images');
                $updated['image'] = $imagePath;
            } else {
                $updated['image'] = $recipe->image;
            }

            $recipe->update($updated);

            return redirect('/');

        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('editing_recipe_id', $recipe->id);
        }
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
