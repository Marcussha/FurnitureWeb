<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        try {
            $product = Product::select();
            $data = Category::get();
        } catch (\Exception $e) {
            // Handle exception
        }
        return view('admin.category.index', compact('data'));
    }

    // Show the form for creating a new category
    public function create()
    {
        $categories = Category::get();
        return view('admin.category.create', compact('categories'));
    }

    // Store a newly created category in storage
    public function save(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|unique:categories,categoryID',
            'name' => 'required|unique:categories,categoryName',
        ]);

        // Create a new category
        $category = new Category();
        $category->categoryID = $request->id;
        $category->categoryName = $request->name;
        $category->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $categories = Category::get();
        $data = Category::where('categoryID', '=', $id)->first();
        return view('admin.category.edit', compact('data', 'categories'));
    }

    // Update the specified category in storage
    public function update(Request $request)
    {
        $categoryID = $request->id;

        // Validate the request data
        $request->validate([
            'name' => 'required|unique:categories,categoryName,' . $categoryID . ',categoryID',
        ]);

        // Update the category
        $categoryName = $request->name;
        Category::where('categoryID', '=', $categoryID)->update([
            'categoryName' => $categoryName,
        ]);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }


    // Remove the specified category from storage
    public function delete($id)
    {
        try {
            // Check if the category is in use
            $categoryInUse = Product::where('categoryID', $id)->exists();

            if ($categoryInUse) {
                // If the category is in use, set the error message
                $msg = 'The category is in use and cannot be deleted.';
                $type = 'error'; // Or 'danger', depending on your view configuration
            } else {
                // If not in use, proceed to delete the category
                Category::where('categoryID', $id)->delete();
                // Set the success message
                $msg = 'Category removed ' . $id . ' successfully!';
                $type = 'success';
            }
        } catch (\Exception $e) {
            // Log the error and set the error message
            Log::error('Category deletion error: ' . $e->getMessage());
            $msg = 'An error occurred: ' . $e->getMessage();
            $type = 'error'; // Or 'danger', depending on your view configuration
        }
        
        // Redirect back with the message
        return back()->with($type, $msg);
    }


    // Display the categories on the about page
    public function indexC()
    {
        $product = Product::select();
        $data = Category::get();
        return view('about', compact('data'));
    }

}
