<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function manage(){
        $categories = Category::orderBy('name')->paginate(10);

        return view('category.manageCategory',[
            'categories' => $categories,
            'page' => 'admin',
        ]);
    }

    public function add(){
        $categories = Category::all();

        return view('category.addCategory', [
            'categories' => $categories,
            'page' => 'admin',
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'category' => 'required|unique:categories,name'
        ]);

        $name = Str::title($request->category);
        $slug = Str::slug($request->category);
        
        $category = new Category();
        $category->name = $name;
        $category->slug = $slug;
		$category->save();

        return redirect()->route('manage-categories');
    }

    public function delete(Category $category){
        $games = $category->game;

        foreach ($games as $game) {
            Storage::deleteDirectory("public/Assets/Image/{$game->slug}");
        }

        $category->delete();

        return redirect()->back();
    }

    public function update(Category $category){
        return view('category.updateCategory',[
            'category' => $category,
            'page' => 'admin',
        ]);
    }

    public function change(Request $request, Category $category){
        $request->validate([
            'category' => ['required', Rule::unique('categories','name')->ignore($category->id)]
        ]);

        $name = Str::title($request->category);
        $slug = Str::slug($request->category);
        
        $category->name = $name;
        $category->slug = $slug;
		$category->save();

        return redirect()->route('manage-categories');
    }
}
