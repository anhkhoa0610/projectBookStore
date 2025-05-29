<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {


        // $request->validate([
        //     'rating' => 'required|integer|min:1|max:5',
        //     'comment' => 'required|string'
        // ]);

        $review = Review::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'date_review' => now(),
        ]);

        return response()->json(['message' => 'Đánh giá thành công', 'review' => $review]);
    }
}
