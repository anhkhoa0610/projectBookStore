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
        $request->validate([
            'publisher_name' => 'required|string|max:10',
            'contact_info' => 'required|string|max:255',
        ]);

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
        $request->validate([
            'publisher_name' => 'required|string|max:10',
            'contact_info' => 'required|string|max:255',
        ]);
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
    public function listPublisher(Request $request)
    {
        $search = $request->input('search');

        $publishers = Publisher::when($search, function ($query, $search) {
            $query->where('publisher_name', 'like', "%{$search}%")
                  ->orWhere('contact_info', 'like', "%{$search}%");
        })->paginate(10)->appends(['search' => $search]); // Append search query to pagination links

        return view('crud_publisher.list', compact('publishers'));
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
