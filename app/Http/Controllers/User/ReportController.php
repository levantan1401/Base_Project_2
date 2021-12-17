<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\baohong;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $report =baohong::get();
        $user_id = Auth::guard('customer')->user()->id;
        $oder_product= baohong::with('getuser')
        ->where('id_user',"=",'1')
        ->get();
        // // return $oder_product;
        // return $user_id;
        return view('user.sell_step');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.sell_step');
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
        $id_user = Auth::guard('customer')->user()->id;
        $this->validate($request, [
            'tinhtrang' => 'required',

        ], [
            'name.required' => 'không được bỏ trong tình trạng không được để trống',

        ]);
        $request->offsetUnset('_token');
        $status =$request->get('status','0');
        $img = str_replace(url('public/uploads') . '/', '', $request->image);
        $request->merge(['image' => $img,
                         'id_user'=>$id_user
        ]);
        baohong::create($request->all());
        return  redirect()->route('report.index')->with('status','Cảm ơn sự phải hồi của bạn');
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
