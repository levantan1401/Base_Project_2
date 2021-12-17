<?php

namespace App\Http\Controllers\User;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index() 
    {
        return view('user.checkout');
    }
    
    public function success()
    {
        
    }
    
    public function submit_form(Request $request, CartHelper $cart)
    {
        $c_id = Auth::guard('customer')->user()->id;
        $c_email = Auth::guard('customer')->user()->email;
        $c_name = Auth::guard('customer')->user()->name;
        if($order = Order::create([
            'or_note' => $request->or_note,
            'userID' => $c_id,
            'status' => $request->status,
        ])){
            $order_id = $order->id;
            foreach($cart->items as $product_id => $item){
                $quantity = $item['quantity'];
                $price = $item['price'];
                OrderDetail::create([
                    'id_order' => $order_id,
                    'id_product' => $product_id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
            }
            Mail::send('mail.order',[
                'c_name' =>$c_name,
                'order' =>$order,
                'items' =>$cart->items,
            ], function($mail) use($c_email,$c_name){
                $mail->to($c_email,$c_name);
                $mail->from('banhangxevinfast@gmail.com');
                $mail->subject('🌟 Tập Đoàn Kinh Doanh Xe Oto VinFast Thông Báo🌟');
            });
            session(['cart' => '']);

            return redirect()->route('home')->with('alert','Đặt hàng thành công');
        }
        else{
            return redirect()->back()->with('error', 'Đặt hàng thất bại');
        }
    }

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
        //
    }
}
