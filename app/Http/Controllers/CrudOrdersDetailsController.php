<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Orders;
use App\Models\OrdersDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;

class CrudOrdersDetailsController extends Controller
{
    /**
     * Login page
     */
    public function login()
    {
        return view('crud_orders.login');
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

        return redirect("login")->withSuccess('Login Detailss are not valid');
    }

    /**
     * Registration page
     */
    public function createOrderDetails(Request $request)
    {
        $order_id = $request->get('order_id');
        $dataBooks = Books::all();
      
        return view('crud_orders_Details.create', ['order_id' => $order_id], ['dataBooks' => $dataBooks]);
    }

    /**
     * User submit form register
     */
    public function postOrderDetails(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
      

        $data = $request->all();
        $book = Books::find($data['book_id']);
        $data['price'] = $book->price * $data['quantity'];
        OrdersDetails::create([
            'order_id' => $data['order_id'],
            'book_id' => $data['book_id'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
        ]);

         CrudOrdersController::upDatePrice($data['order_id']);

        return redirect("listOrderDetailsByIdOrder?order_id=".$data['order_id'])->with('status', 'Registration successful');
    }

    /**
     * View user Details page
     */
    public function readOrderDetails(Request $request)
    {
        $order_detail_id = $request->get('order_detail_id');
        $orderDetails = OrdersDetails::find($order_detail_id);
        return view('crud_orders_details.read', ['orderDetails' => $orderDetails]);
    }

    /**
     * Delete user by id
     */
    public function deleteOrderDetails(Request $request)
    {
        $order_detail_id = $request->get('order_detail_id');
        $orderDetails = OrdersDetails::find($order_detail_id);
        CrudOrdersController::upDatePrice($orderDetails->order_id);
        OrdersDetails::destroy($order_detail_id);
       
        return redirect("listOrderDetailsByIdOrder?order_id=".$orderDetails->order_id)->with('status', 'Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updateOrderDetails(Request $request)
    {
        $order_detail_id = $request->get('order_detail_id');
        $orderDetails = OrdersDetails::find($order_detail_id);
        $dataBooks = Books::all();
        return view('crud_orders_details.update', ['orderDetails' => $orderDetails],['dataBooks' => $dataBooks]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateOrderDetails(Request $request)
    {
        $input = $request->all();

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,id,'.$input['id'],
        //     'password' => 'required|min:6',
        //     'like' => 'required',
        //     'age' => 'required',
        // ]);
        $orderDetails = OrdersDetails::find($input['order_detail_id']);

        $price = Books::find($input['book_id']);
        $input['price'] = $price->price * $input['quantity'];
        $orderDetails->order_id = $input['order_id'];
        $orderDetails->book_id = $input['book_id'];
        $orderDetails->quantity = $input['quantity'];
        $orderDetails->price = $input['price'];
        $orderDetails->save();
        CrudOrdersController::upDatePrice($orderDetails->order_id);
        return redirect("listOrderDetailsByIdOrder?order_id=".$orderDetails->order_id)->with('status', 'Update successfully');
    }

    /**
     * List of users
     */
    public function listOrderDetails()
    {
        // if(Auth::check()){
        //     $users = User::all();
        //     return view('crud_user.list', ['users' => $users]);
        // }
        $ordersDetails = OrdersDetails::all();
        return view('crud_orders_details.list', ['orderDetails' => $ordersDetails]);
        // return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function listOrderDetailsById(Request $request)
    {
        // if(Auth::check()){
        //     $users = User::all();
        //     return view('crud_user.list', ['users' => $users]);
        // }
        $order_id = $request->get('order_id');
        $ordersDetails = OrdersDetails::where('order_id', $order_id)->get(); 
        return view('crud_orders_Details.list', ['ordersDetails' => $ordersDetails]);
        // return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function listOrderDetailsByOrderId(Request $request)
    {
        $search = $request->input('search');
        $order_id = $request->get('order_id');
        $ordersDetails = OrdersDetails::where('order_id', $order_id)->when($search, function ($query, $search) {
            $query->where('order_id', 'like', "%{$search}%")
                  ->orWhere('book_id', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%");
        })->paginate(3)->appends(['search' => $search, 'order_id' => $order_id]); // Append search query to pagination links

        return view('crud_orders_details.list', compact('ordersDetails'));
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