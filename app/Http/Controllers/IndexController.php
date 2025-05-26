<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return $categories;
    }

    public function index()
    {
        return view('index');
    }

    public function allBooks()
    {
        $books = Books::paginate(8);
        $soldBooks = Books::orderBy('volume_sold', 'desc')->take(4)->get();
        $newBooks = Books::orderBy('published_date', 'desc')->take(4)->get();
        return view('index', [
            'books' => $books,
            'soldBooks' => $soldBooks,
            'newBooks' => $newBooks,
        ]);
    }

    public function searchAPI($keyword)
{
    $books = Books::with(['author'])
        ->where(function($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')
                  ->orWhereHas('author', function ($q) use ($keyword) {
                      $q->where('author_name', 'like', '%' . $keyword . '%');
                  });
        })
        ->get();

    return response()->json($books);
}
}

