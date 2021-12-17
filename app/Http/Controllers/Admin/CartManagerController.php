<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function view()
    {
        $order = Order::orderBy('created_at','DESC')->paginate(10);
        //TÌM KIẾM THEO KEYWORD
        if ($keyword = request()->keyword) {
            $order = Order::orderBy('created_at','DESC')->search()->paginate(10);
        }
        $orderdetail = OrderDetail::all();
        return view('admin.Cart.cart_view',compact('order','orderdetail'));
    }

    public function cart_success($id)
    {
        $order =  Order::where(['id' => $id])->update([
            'tinhtrang' => 1
        ]);
        
        return redirect()->route('cart_view')->with('success','Cập nhật thành công');
    }

    public function cart_cancel($id)
    {
        
        $update =  Order::where(['id' => $id])->update([
            'tinhtrang' => 2
        ]);
        return redirect()->route('cart_view')->with('success','Đã Hủy');
    }

    public function cart_detail($id)
    {
        // $order_detail = OrderDetail::where(['id_order' => $id]);
        $order_detail = OrderDetail::where('id_order', $id)->get();
        return view('admin.Cart.cart_detail',compact('order_detail'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);
        OrderDetail::destroy('id_order',$id);
        return redirect()->back()->with('success','Xóa thành công');
    }
}
