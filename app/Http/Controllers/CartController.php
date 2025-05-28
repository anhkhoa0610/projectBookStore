<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class CartController extends Controller
{
    public function showCart()
    {
        // Hiển thị giỏ hàng
        return view('cart.cart');
        
    }
    public function addToCart($id, Request $request)
    {
        // Thêm sản phẩm vào giỏ hàng
        $book = Books::find($id);
        $cart = session()->get('cart', []);
       
         $cart[$id] = [
            "title" => $book->title,
            "quantity" => $request->quantity,
            "price" => $book->price,
            "cover_image" => $book->cover_image,
             "description" => $book->description,
        ];
       

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    
}

?>