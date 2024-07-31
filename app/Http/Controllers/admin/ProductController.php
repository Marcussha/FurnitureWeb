<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Trademark;

class ProductController extends Controller
{
    public function getProduct(){
        
        $data = Product::select('products.*', 'trademark.trademarkName', 'categories.categoryName')
            ->join('trademark', 'products.trademarkId', '=', 'trademark.trademarkId')
            ->join('categories', 'products.categoryID', '=', 'categories.categoryID')
            ->get();

        return view('admin/product/index', compact('data'));
    }


    public function addP(){
        $categories = Category::get();
        $trademark = Trademark::get();
        return view('admin.product.add', compact('categories','trademark'));
    }

    public function saveP(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $product = new Product();
        $product->productID = $request->id;
        $product->productName = $request->name;
        $product->productPrice = $request->price;
        $product->productDetails = $request->detail;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . time() . '.' . $image->extension();
            $image->move(public_path('Image/products'), $imageName);
            $product->productImage1 = $imageName;
        }
    
        $product->trademarkId = $request->trademark;
        $product->categoryID = $request->category;
        $product->save();
    
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    

    public function editP($id){

        $categories= Category::get();
        $trademark = Trademark::get();
        $data = Product:: where('productID','=',$id)->first();
        return view('admin.product.update', compact('data','trademark','categories'));
    }

    public function updateP(Request $request)
    {
        $productID = $request->id;
        $productName = $request->name;
        $productPrice = $request->price;
        $productDetails = $request->detail;
        $trademarkId = $request->trademark;
        $categoryID = $request->category;
        
        // Retrieve the current product image from the database
        $product = Product::where('productID', $productID)->first();
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $currentImage = $product->productImage1;

        // Handle image upload
        if ($request->hasFile('image')) {
            // If a new image is uploaded, store it and update the image path
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Image/products'), $imageName);
            $productImage1 = $imageName;
        } else {
            // If no new image is uploaded, keep the current image
            $productImage1 = $currentImage;
        }

        try {
            // Update the product details
            Product::where('productID', $productID)->update([
                'productName' => $productName,
                'productPrice' => $productPrice,
                'productDetails' => $productDetails,
                'productImage1' => $productImage1,
                'trademarkId' => $trademarkId,
                'categoryID' => $categoryID
            ]);
            
            return redirect()->back()->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            // Log any errors and return an error message
            Log::error('Product update error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

   
    public function deleteP($id)
    {
        $data = Product::where('productID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product removed successfully!');
    }

    // Method to display products on client page
    public function index(){

        $data= Product::select('products.*','trademark.trademarkName')
        ->join('trademark','products.trademarkId','=','trademark.trademarkId')->get();
        return view('listProduct',compact('data'));

        /* $data = Product::select('products.*','categories.categoryName')
        ->join('categories', ' products.categoryID','=','categories.categoryID')
        -> get();
        return view("admins/products/index"); */
    }

     // Method to display products by category
     public function showByCategory($id){
         // Fetch the selected category
         $category = Category::where('categoryID', $id)->first();
 
         if (!$category) {
             return redirect('/')->with('error', 'Category not found');
         }
 
         // Fetch products for the selected category
         $products = Product::where('categoryID', $id)->get();
 
         return view('doing', compact('products', 'category'));
     }
}
