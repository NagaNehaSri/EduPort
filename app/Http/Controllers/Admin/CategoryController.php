<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $data = Category::orderby('created_at', 'DESC')->get();
        return view('admin.categories.index', compact('data'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'nullable',
    ]);

    // Set default value if name is empty or null
    $validated['name'] = $validated['name'] ?: 'Untitled Category';

    // Generate slug from name
    $validated['slug'] = Str::slug($validated['name'], '-');

    Category::create($validated);

    return redirect()->route('categories.index')->with('success', 'New Category Added');
}

    public function edit($id)
    {
        $data = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('data'));
    }

  

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'nullable|string|max:255',
    ]);

    // Fallback default name if null/empty
    $validated['name'] = $validated['name'] ?: 'Untitled Category';

    // Generate slug from name
    $validated['slug'] = Str::slug($validated['name'], '-');

    Category::findOrFail($id)->update($validated);

    return redirect()->route('categories.index')->with('success', 'Category Data Updated :)');
}

    public function destroy($id) {
        $data = Category::findOrFail($id);

        $data->delete();

        return redirect()->route('categories.index')->with('danger', 'Category Deleted');
    }
}
