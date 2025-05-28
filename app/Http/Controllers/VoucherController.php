<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    //
    public function index()
    {
        // Logic to display a list of vouchers
        $books = Books::all(); // Fetch all books, assuming vouchers are related to books
        return view('voucher', compact('books'));
    }
}
