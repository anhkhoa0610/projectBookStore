<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
    /**
     * Display list of users
     */
    public function listUser(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $query = User::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(10);
        return view('crud_user.list', compact('users'));
    }

    public function createUser()
    {
        return view('crud_user.create');
    }

    /**
     * Store new user
     */
    public function postUser(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|string|min:10|max:15|unique:users',
            'address' => 'required|string',
            'dob' => 'required|date|before:today',
            'role' => 'required|in:admin,manager,user'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_active'] = true;

        User::create($validated);

        return redirect()->route('user.list')
            ->with('status', 'User created successfully');
    }

    /**
     * Show user details
     */
    public function readUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        return view('crud_user.read', ['messi' => $user]);
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        return view('crud_user.update', compact('user'));
    }

    /**
     * Update user
     */
    public function postUpdateUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($request->id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,'.$request->id,
            'phone' => 'required|string|min:10|max:15|unique:users,phone,'.$request->id,
            'address' => 'required|string',
            'dob' => 'required|date|before:today',
            'role' => 'required|in:admin,manager,user'
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|min:8|confirmed'
            ]);
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return redirect()->route('user.list')
            ->with('status', 'User updated successfully');
    }

    /**
     * Delete user
     */
    public function destroy($id)
    {
           try {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.list')->with('status', 'User deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('user.list')->with('error', 'Error delete user: ' . $e->getMessage());
    }
    }

    /**
     * Toggle user active status
     */
    public function toggleStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully'
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    /**
     * Process login
     */
    public function authUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.list')
                ->with('status', 'Logged in successfully');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }

    /**
     * Process logout
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}