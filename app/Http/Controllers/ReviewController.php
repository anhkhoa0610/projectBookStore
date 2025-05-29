<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class ReviewController extends Controller
{
    public function storeReview(Request $request)
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


    public function updateReview(Request $request)
    {

        $review = Review::findOrFail($request->review_id);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'date_review' => now(),
        ]);
        return response()->json(['message' => 'Cập nhật đánh giá thành công', 'review' => $review]);
    }

    public function deleteReview(Request $request)
    {

        $review = Review::findOrFail($request->review_id);
        $review->delete();

        return response()->json(['message' => 'Xóa đánh giá thành công']);
    }
}
