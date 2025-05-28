<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\CategoryBook;
use App\Models\Repo;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use App\Models\Category;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;

class ItemController extends Controller
{
    public function showItemDetail($book_id)
    {
        $book = Books::with(['categories', 'publisher', 'author'])->findOrFail($book_id);

        $relatedBooks = collect();
        $index = 0;
        foreach ($book->categories as $category) {
            $index++;
            $categoryWithBooks = Category::with('books')->findOrFail($category->category_id);
            $relatedBooks = $relatedBooks->merge($categoryWithBooks->books);
       
        }
        $relatedBooks = $relatedBooks
            ->where('book_id', '!=', $book_id)
            ->unique('book_id')
            ->take(4)
            ->values();

         $bookWishList = Wishlists::where('book_id', $book_id)->exists();
        //  dd($bookWishList);
        return view('item', compact('book', 'relatedBooks','bookWishList'));
    }
}
