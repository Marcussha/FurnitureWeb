<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trademark;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class TrademarkController extends Controller
{
    public function index()
    {
        $product= Product::select();
        $data = Trademark::get();
        return view('admin.trademark.index',compact('data'));
    }
    public function create()
    {
        $trademark = Trademark::get();
        return view('admin.trademark.create', compact('trademark'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:trademark,trademarkID',
            'name' => 'required|unique:trademark,trademarkName',
        ]);

        $trademark = new Trademark();
        $trademark->trademarkID = $request->id;
        $trademark->trademarkName = $request->name;
        $trademark->save();

        return redirect()->back()->with('success', 'Trademark added successfully!');
    }


    public function edit($id)
    {
        $data = Trademark::where('trademarkId', $id)->first();
        return view('admin.trademark.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:trademark,trademarkName,' . $request->id . ',trademarkId',
        ]);

        Trademark::where('trademarkId', $request->id)->update([
            'trademarkName' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Producer updated successfully!');
    }


    public function delete($id)
    {
        try {
            // Check if the category is in use
            $categoryInUse = Product::where('trademarkId', $id)->exists();

            if ($categoryInUse) {
                // If the category is in use, set the error message
                $msg = 'The producer is in use and cannot be deleted.';
                $type = 'error'; // Or 'danger', depending on your view configuration
            } else {
                // If not in use, proceed to delete the category
                Trademark::where('trademarkId', $id)->delete();
                // Set the success message
                $msg = 'Producer removed ' . $id . ' successfully!';
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

}
