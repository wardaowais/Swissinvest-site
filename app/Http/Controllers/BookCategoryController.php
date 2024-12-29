<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    // Display the list of categories
    public function index()
    {
        $categories = BookCategory::all();
        return view('admin.book-categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.book-categories.create');
    }

    // Store a newly created category in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        BookCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('book-categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified category
    public function edit(BookCategory $bookCategory)
    {
        return view('admin.book-categories.edit', compact('bookCategory'));
    }

    // Update the specified category in storage
    public function update(Request $request, BookCategory $bookCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $bookCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('book-categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from storage
    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();

        return redirect()->route('book-categories.index')->with('success', 'Category deleted successfully.');
    }
}
