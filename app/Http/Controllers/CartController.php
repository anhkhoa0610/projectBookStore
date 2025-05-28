<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart()
    {
        $user = Auth::user();
        $cartItems = [];
        if ($user) {
            $cartItems = Cart::with('book')->where('user_id', $user->id)->get();
        }
        return view('cart.cart', compact('cartItems'));
    }
    public function addToCart($id, Request $request)
    {
        $book = Books::findOrFail($id);
        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        // Always add 1 to cart
        $quantity = 1;

        // Check if item already in cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('book_id', $id)
            ->first();

        if ($cartItem) {
            // Update quantity by 1
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Add new item with quantity 1
            Cart::create([
                'user_id' => $user->id,
                'book_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
  
}
