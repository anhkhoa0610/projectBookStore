<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_book.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createBook()
    {
        return view('crud_book.create');
    }

    /**
     * User submit form register
     */
    public function postBook(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        $data = $request->all();
        Books::create([
            'title' => $data['title'],
            'summary' => $data['summary'],
            'author_id' => $data['author_id'],
            'category_id' => $data['category_id'],
            'publisher_id' => $data['publisher_id'],
            'description' => $data['description'],
            'price' => $data['price'],
            'cover_image' => $data['cover_image'],
            'volume_sold' => $data['volume_sold'],
        ]);

        return redirect("list")->with('status', 'Registration successful');
    }

    /**
     * View user detail page
     */
    public function readBook(Request $request)
    {
        $book_id = $request->get('book_id');
        $book = Books::find($book_id);

        return view('crud_book.read', ['book' => $book]);
    }

    /**
     * Delete user by id
     */
    public function deleteBook(Request $request)
    {
        $book_id = $request->get('book_id');
        $book = Books::destroy($book_id);

        return redirect("list")->with('status', 'Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updateBook(Request $request)
    {
        $book_id = $request->get('book_id');
        $book = Books::find($book_id);

        return view('crud_book.update', ['book' => $book]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateBook(Request $request)
    {
        $input = $request->all();

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,id,'.$input['id'],
        //     'password' => 'required|min:6',
        //     'like' => 'required',
        //     'age' => 'required',
        // ]);

        $book = Books::find($input['book_id']);
        $book->title = $input['title'];
        $book->summary = $input['summary'];
        $book->author_id = $input['author_id'];
        $book->category_id = $input['category_id'];
        $book->publisher_id = $input['publisher_id'];
        $book->description = $input['description'];
        $book->price = $input['price'];
        $book->cover_image = $input['cover_image'];
        $book->volume_sold = $input['volume_sold'];
        $book->save();

        return redirect("list")->with('status', 'Update successfully');
    }

    /**
     * List of users
     */
    public function listBook()
    {
        // if (Auth::check()) {
        //     $books = Books::all();
        //     return view('crud_book.list', ['books' => $books]);
        // }

        $books = Books::all();
        return view('crud_book.list', ['books' => $books]);
        // return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
