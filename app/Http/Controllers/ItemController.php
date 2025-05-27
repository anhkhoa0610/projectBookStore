<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\CategoryBook;
use App\Models\Repo;
use Illuminate\Http\Request;
use App\Models\Category;

class ItemController extends Controller
{
    public function showItemDetail($book_id)
    {
        $book = Books::with(['categories', 'publisher', 'author'])->findOrFail($book_id);
        $booksWithCategory = CategoryBook::with('category')
            ->where('book_id', $book_id)->get();
            
        dd($booksWithCategory);
        return view('item', compact('book'));
    }
}
