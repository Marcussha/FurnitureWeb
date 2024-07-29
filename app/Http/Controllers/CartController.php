<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\RecieptDetail;
use App\Models\RecieptCustomer;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Find the product using the correct column name
        $product = Product::where('productID', $productId)->firstOrFail();

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->productName,
                'price' => $product->productPrice,
                'quantity' => 1,
                'image' => $product->productImage1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }

    public function generateUniqueId()
    {
        // Get the maximum value of RecieptId in the table
        $maxId = RecieptCustomer::max('RecieptId');

        // Increment the maximum value to generate a new unique ID
        return $maxId ? $maxId + 1 : 1;
    }

    public function checkout(Request $request)
    {
        // Validate input
        $request->validate([
            'customer_id' => 'required',
        ]);

        // Create reciept_customer record
        $reciept = new RecieptCustomer();
        $reciept->RecieptId = $this->generateUniqueId(); // Use generated unique ID
        $reciept->customerId = $request->customer_id;
        $reciept->quantity = array_sum(array_column(Session::get('cart'), 'quantity'));
        $reciept->price = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, Session::get('cart')));
        $reciept->save();

        // Get the generated RecieptId
        $recieptId = $reciept->RecieptId;

        // Add items to recieptdetail
        foreach (Session::get('cart') as $productId => $item) {
            $recieptDetail = new RecieptDetail();
            $recieptDetail->RecieptId = $recieptId;
            $recieptDetail->dateBuy = now();
            $recieptDetail->totalPrice = $item['price'] * $item['quantity'];
            $recieptDetail->productID = $productId;
            $recieptDetail->save();
        }

        // Clear cart
        Session::forget('cart');

        return redirect()->route('home')->with('success', 'Checkout successful!');
    }


    public function removeItem(Request $request, $productID)
    {
        $cart = Session::get('cart');
        if(isset($cart[$productID])) {
            unset($cart[$productID]);
            Session::put('cart', $cart);
        }
        return redirect()->back();
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->back();
    }

    public function index()
    {
        // Retrieve all cart items
        $carts = RecieptCustomer::with('details')->get();

        // Pass the cart items to the view
        return view('admin.cart.cart', compact('carts'));
    }

}
