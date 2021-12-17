<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\product;
use App\Models\Statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class HomeController extends Controller
{
  // đăng nhập thành công login trỏ vào đây
  public function admin()
  {
    $countorder = Order::all()->count();
    $countpost = Post::all()->count();
    $countPrice = OrderDetail::all();
    $countProduct = product::all()->count();
    $countUser = User::all()->count();
    $order = Order::orderBy('created_at','DESC')->paginate(8);
    $admin = admin::all();
    return view('admin.dashboard', compact(['countorder', 'countpost', 'countPrice', 'countProduct', 'order' ,'countUser']));
  }

  public function days_order()
  {
    $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $get = Statistical::whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();

    foreach($get as $key=>$val){
      $chart_data[] = array(
        'period' => $val->order_date,
        'order' => $val->total_order,
        'sales' => $val->sales,
        'profit' => $val->profit,
        'quantity' => $val->quantity,
      );
    }
    echo $data = json_encode($chart_data);
  }

  public function filter_by_date(Request $request)
  {
    $data = $request->all();
    $from_date = $data['from_date'];
    $to_date = $data['to_date'];

    $get = Statistical::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();

    foreach ($get as $key => $val) {
      $chart_data[] = array(
        'period' => $val->order_date,
        'order' => $val->total_order,
        'sales' => $val->sales,
        'profit' => $val->profit,
        'quantity' => $val->quantity,
      );
    }
    echo $data = json_encode($chart_data);
  }

  public function dashboard_filter(Request $request)
  {
    $data = $request->all();

    $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth();
    $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth();

    $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

    $dauthang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->startOfMonth();
    $cuoithang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->endOfMonth();

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    if ($data['dashboard_value'] == 'thangtruoc') {
      $get = Statistical::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
    } elseif ($data['dashboard_value'] == 'thangnay') {
      $get = Statistical::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
    } elseif ($data['dashboard_value'] == '7ngay') {
      $get = Statistical::whereBetween('order_date', [$sub7days, $now])->orderBy('order_date', 'ASC')->get();
    } elseif ($data['dashboard_value'] == 'thang9') {
      $get = Statistical::whereBetween('order_date', [$dauthang9, $cuoithang9])->orderBy('order_date', 'ASC')->get();
    } else {
      $get = Statistical::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
    }

    foreach ($get as $key => $val) {
      $chart_data[] = array(
        'period' => $val->order_date,
        'order' => $val->total_order,
        'sales' => $val->sales,
        'profit' => $val->profit,
        'quantity' => $val->quantity,
      );
    }
    echo $data = json_encode($chart_data);

  }
  

}
