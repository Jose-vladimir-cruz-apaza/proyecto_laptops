<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();        
        return view('Laptops.categories.index', compact('categories'));
    }

    
    public function create()
    {
        return view('Laptops.categories.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    
    public function edit(Category $category)
    {
        return view('Laptops.categories.edit', compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    
    // public function destroy(Category $category)
    // {
    //     dd("llega");        
    //     $category->delete();        
    //     return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    // }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

}
