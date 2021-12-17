<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ResetPassController extends Controller
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
        $data =Admin::find($id);
        return view('admin.Account.Profile.pass')->with(compact('data'));
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
         //
         $data = $request->validate([
            'password_old' => 'required',
            'password' => 'required',
            'passwordConfirmation' =>'required|same:password',
        ],
        [
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password_old.required'=>'Vui lòng nhập mật khẩu cũ',
            'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'passwordConfirmation.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordConfirmation.same'=>'Mật khẩu nhập lại chưa khớp',
        ]);
        $admin =Admin::find($id);
        if(!(Hash::check($request->get('password_old'),Auth::user()->password))){
            return back()->with('messages','Mật Khẩu cũ không đúng');
        }
        if(strcmp($request->get('password_old'),$request->get('password'))==0){
            return back()->with('messages','Mật Khẩu');
        }
        $admin->password =bcrypt($data['password']);
        $admin->save();
        return redirect()->route('resetmk.edit',Auth::user()->id)->with('messages','Đổi mật khẩu thành công');
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
