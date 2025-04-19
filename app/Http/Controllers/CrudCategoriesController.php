<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudCategoriesController extends Controller
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
    public function createCategory()
    {
        return view('crud_categories.create');
    }

    /**
     * User submit form register
     */
    public function postCategory(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        $data = $request->all();
        Category::create([
            'category_name' => $data['category_name'],
            'category_desc' => $data['category_desc'],
        ]);

        return redirect("listCate")->with('status','Registration successful');
    }

    /**
     * View user detail page
     */
    public function readCategory(Request $request) {
        $category_id = $request->get('category_id');
        $category = Category::find($category_id);

        return view('crud_categories.read', ['category' => $category]);
    }

    /**
     * Delete user by id
     */
    public function deleteCategory(Request $request) {
        $category_id = $request->get('category_id');
        $category = Category::destroy($category_id);

        return redirect("listCate")->with('status','Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updateCategory(Request $request)
    {
        $category_id = $request->get('category_id');
        $category = Category::find($category_id);
        return view('crud_categories.update', ['category' => $category]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateCategory(Request $request)
    {
        $input = $request->all();

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,id,'.$input['id'],
        //     'password' => 'required|min:6',
        //     'like' => 'required',
        //     'age' => 'required',
        // ]);

       $category = Category::find($input['category_id']);
       $category->category_name = $input['category_name'];
       $category->category_desc = $input['category_desc'];
       $category->save();

        return redirect("listCate")->with('status','Update successfully');
    }

    /**
     * List of users
     */
    public function listCategories()
    {
        // if(Auth::check()){
        //     $users = User::all();
        //     return view('crud_user.list', ['users' => $users]);
        // }
        $categories = Category::all();
        return view('crud_categories.list', ['categories' => $categories]);
        // return redirect("login")->withSuccess('You are not allowed to access');
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
