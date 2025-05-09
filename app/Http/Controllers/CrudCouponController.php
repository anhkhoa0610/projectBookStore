<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CrudCouponController extends Controller
{
    /**
     * Display a listing of coupons.
     */
    public function listCoupon(Request $request)
    {
        $search = $request->input('search');

        $coupons = Coupon::when($search, function ($query, $search) {
            $query->where('coupon_code', 'like', "%{$search}%")
                  ->orWhere('discount_amount', 'like', "%{$search}%")
                  ->orWhere('valid_from', 'like', "%{$search}%")
                  ->orWhere('valid_to', 'like', "%{$search}%");
        })->paginate(10)->appends(['search' => $search]);
        return view('crud_coupon.list', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new coupon.
     */
    public function createCoupon()
    {
        return view('crud_coupon.create');
    }

    /**
     * Store a newly created coupon in storage.
     */
    public function postCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:20|unique:coupons',
            'discount_amount' => 'required|numeric|min:0',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ]);

        Coupon::create($request->all());

        return redirect()->route('coupon.list')->with('status', 'Coupon created successfully!');
    }

    /**
     * Show the form for editing the specified coupon.
     */
    public function editCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('crud_coupon.edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified coupon in storage.
     */
    public function updateCoupon(Request $request, $id)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:20|unique:coupons,coupon_code,' . $id,
            'discount_amount' => 'required|numeric|min:0',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());

        return redirect()->route('coupon.list')->with('status', 'Coupon updated successfully!');
    }

    /**
     * Remove the specified coupon from storage.
     */
    public function deleteCoupon($id)
    {
        Coupon::destroy($id);
        return redirect()->route('coupon.list')->with('status', 'Coupon deleted successfully!');
    }

    /**
     * Show the form for viewing the specified coupon.
     */
    public function readCoupon($id)
    {
        $coupon = Coupon::findOrFail($id); // Find the coupon by ID or throw a 404 error
        return view('crud_coupon.read', ['coupon' => $coupon]); // Pass the coupon to the view
    }
}