<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;
use App\Models\OrdersDetails;
class CrudOrdersController extends Controller
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

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createOrder()
    {
        $dataCoupons = Coupon::all();
        return view('crud_orders.create',['dataCoupons'=>$dataCoupons]);
    }

    /**
     * User submit form register
     */
    public function postOrder(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        $data = $request->all();
        $total_price = 0;
     
        Orders::create([
            'user_id' => $data['user_id'],
            'order_date' => $data['order_date'],
            'status' => $data['status'],
            'tracking_number' => $data['tracking_number'],
            'carrier' => $data['carrier'],
            'coupon_id' => $data['coupon_id'],
            'total_price' => $total_price,
        ]);

        return redirect("listOrder")->with('status','Registration successful');
    }

    /**
     * View user detail page
     */
    public function readOrder(Request $request) {
        $order_id = $request->get('order_id');
        $order = Orders::find($order_id);
        return view('crud_orders.read', ['order' => $order]);
    }

    /**
     * Delete user by id
     */
    public function deleteOrder(Request $request) {
        $order_id = $request->get('order_id');
        $order = Orders::destroy($order_id);

        return redirect("listOrder")->with('status','Delete successfully');
    }

    /**
     * Form update user page
     */
    public function updateOrder(Request $request)
    {
        $dataCoupons = Coupon::all();

        $order_id = $request->get('order_id');
        $order = Orders::find($order_id);
        return view('crud_orders.update', ['order' => $order],['dataCoupons'=>$dataCoupons]);
    }
    public static function upDatePrice( $order_id){
        $order = Orders::find($order_id);
        $odersDetails = OrdersDetails::where('order_id',$order_id)->get();
        $total_price = 0;
        foreach($odersDetails as $orderDetail){
            $total_price += $orderDetail->price;
        }
        if(isset($order->coupon_id)){
            $coupon = Coupon::find($order->coupon_id);
            $order->total_price = $total_price - ($total_price * $coupon->discount_amount / 100);
            $order->save();
            return;
        }
        else{
            $order->total_price = $total_price;
            $order->save();
            return;
        }
    }

    /**
     * Submit form update user
     */
    public function postUpdateOrder(Request $request)
    {
        $input = $request->all();


        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,id,'.$input['id'],
        //     'password' => 'required|min:6',
        //     'like' => 'required',
        //     'age' => 'required',
        // ]);


       $order = Orders::find($input['order_id']);
       $order->user_id = $input['user_id'];
       $order->order_date = $input['order_date'];
       $order->status = $input['status'];
       $order->	tracking_number	 = $input['tracking_number'];
       $order->	carrier	 = $input['carrier'];
       $order->	coupon_id= $input['coupon_id'];
       $order->save();
       CrudOrdersController::upDatePrice($order->order_id);

        return redirect("listOrder")->with('status','Update successfully');
    }

    /**
     * List of users
     */
    public function listOrders()
    {
        // if(Auth::check()){
        //     $users = User::all();
        //     return view('crud_user.list', ['users' => $users]);
        // }
        $orders = Orders::all();
        return view('crud_orders.list', ['orders' => $orders]);
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