<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return $categories;
    }

    public function allBooksAPI()
    {
        $books = Books::with(['author', 'categories'])->paginate(8); // 8 books per page
        return response()->json($books);
    }

    public function categoryAPI($id)
    {
        $books = Books::with(['author', 'categories'])->whereHas('categories', function ($query) use ($id) {
            $query->where('category_book.category_id', $id);
        })->get();
        return response()->json([
            'books' => $books,
        ]);
    }

    public function index()
    {
        $wishlist = Auth::check() ? Auth::user()->wishlist()->with('author', 'categories', 'reviews')->get() : collect();
        $books = Books::with(['author', 'categories'])->paginate(8);
        $soldBooks = Books::with(['author', 'categories'])->orderBy('volume_sold', 'desc')->take(4)->get();
        $newBooks = Books::with(['author', 'categories', 'reviews'])->orderBy('published_date', 'desc')->take(4)->get();
        $categories = Category::all();
        return view('index', [
            'books' => $books,
            'soldBooks' => $soldBooks,
            'newBooks' => $newBooks,
            'categories' => $categories,
            'wishlist' => $wishlist,
        ]);
    }

    public function searchAPI($keyword)
    {
        $books = Books::with(['author'])
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhereHas('author', function ($q) use ($keyword) {
                        $q->where('author_name', 'like', '%' . $keyword . '%');
                    });
            })
            ->get();

        return response()->json($books);
    }

    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        return view('dashboard');
    }

    public function booksByDateAPI()
    {
        $books = Books::with(['author', 'categories'])
            ->orderBy('published_date', 'desc')
            ->paginate(8); 
        return response()->json($books);
    }

    public function booksBySoldAPI()
    {
        $books = Books::with(['author', 'categories'])
            ->orderBy('volume_sold', 'desc')
            ->paginate(8); 
        return response()->json($books);
    }
}

