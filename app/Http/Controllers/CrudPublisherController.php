<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudPublisherController extends Controller
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
    public function createPublisher()
    {
        return view('crud_publisher.create');
    }

    /**
     * User submit form register
     */
    public function postPublisher(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        $data = $request->all();


        Publisher::create([
            'publisher_name' => $data['publisher_name'],
            'contact_info' => $data['contact_info'],
        ]);

        return redirect("listPublisher")->with('status', 'Registration successful');
    }

    /**
     * View user detail page
     */
    public function readPublisher(Request $request)
    {
        $publisher_id = $request->get('publisher_id');
        $publisher = Publisher::find($publisher_id);

        return view('crud_publisher.read', ['publisher' => $publisher]);
    }

    /**
     * Delete user by id
     */
    public function deletePublisher(Request $request)
    {
        $publisher_id = $request->get('publisher_id');
        $publisher = Publisher::destroy($publisher_id);

        return redirect("listPublisher")->with('status', 'Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updatePublisher(Request $request)
    {
        $publisher_id = $request->get('publisher_id');
        $publisher = Publisher::find($publisher_id);

        return view('crud_publisher.update', ['publisher' => $publisher]);
    }

    /**
     * Submit form update user
     */
    public function postUpdatePublisher(Request $request)
    {
        $input = $request->all();

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,id,'.$input['id'],
        //     'password' => 'required|min:6',
        //     'like' => 'required',
        //     'age' => 'required',
        // ]);

        $publisher = Publisher::find($input['publisher_id']);


        $publisher->publisher_name = $input['publisher_name'];
        $publisher->contact_info = $input['contact_info'];
        $publisher->save();

        return redirect("listPublisher")->with('status', 'Update successfully');
    }

    /**
     * List of users
     */
    public function listPublisher()
    {
        // if (Auth::check()) {
        //     $books = Books::all();
        //     return view('crud_book.list', ['books' => $books]);
        // }

        $publishers = Publisher::paginate(2); // Paginate with 2 items per page
    return view('crud_publisher.list', ['publishers' => $publishers]);
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
