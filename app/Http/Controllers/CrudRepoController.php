<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudRepoController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_user.login');
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
    public function createRepo()
    {
        return view('crud_kho.create');
    }

    /**
     * User submit form register
     */
    public function postRepo(Request $request)
    {
        $request->validate([
            'bookName' => 'required',
            'warehouseLocation' => 'required',
            'quantityAvailable' => 'required',
            'lastUpdated' => 'required',

        ]);

        $data = $request->all();
        Repo::create([
            'bookName' => $data['bookName'],
            'warehouseLocation' => $data['warehouseLocation'],
            'quantityAvailable' => $data['quantityAvailable'],
            'lastUpdated' => $data['lastUpdated'],
        ]);

        return redirect("listRepo")->with('status','Registration Repo successful');
    }

    /**
     * View repo detail page
     */
    public function readRepo(Request $request) {
        $repo_id = $request->get('id');
        $repo = Repo::find($repo_id);

        return view('crud_kho.read', ['messi' => $repo]);
    }

    /**
     * Delete user by id
     */
    public function deleteRepo(Request $request) {
        $repo_id = $request->get('id');
        $repo = Repo::destroy($repo_id);

        return redirect("listRepo")->with('status','Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updateRepo(Request $request)
    {
        $repo_id = $request->get('id');
        $repo = Repo::find($repo_id);

        return view('crud_kho.update', ['repo' => $repo]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateRepo(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'bookName' => 'required',
            'warehouseLocation' => 'required',
            'quantityAvailable' => 'required',
            'lastUpdated' => 'required',
        ]);

       $repo = Repo::find($input['id']);
       $repo->bookName = $input['bookName'];
       $repo->warehouseLocation = $input['warehouseLocation'];
       $repo->quantityAvailable = $input['quantityAvailable'];
       $repo->lastUpdated= $input['lastUpdated'];
       $repo->save();

        return redirect("listRepo")->with('status','Update successfully');
    }

    /**
     * List of users
     */
    public function listRepo(Request $request)
    {
            $search = $request->input('search');

            $repos = Repo::when($search, function ($query, $search) {
                $query->where('bookName', 'like', "%{$search}%");

            })->paginate(10)->appends(['search' => $search]); // Append search query to pagination links

            return view('crud_kho.list', ['repos' => $repos]);

    }

    /**
     * Sign out
     */
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
