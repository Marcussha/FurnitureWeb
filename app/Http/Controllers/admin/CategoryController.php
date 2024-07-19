<?php

namespace App\Http\Controllers\admin;

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
            $data = Category::where('categoryID', '=', $id)->delete();
            $data->Category::destroy($id);
            DB::commit();
            $msg = 'Category removed ' . $id . ' successfully!';
            $type = 'success';
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            $type = 'danger';
        }
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
