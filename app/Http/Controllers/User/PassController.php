<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PassController extends Controller
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
        $data =User::find($id);
        return view('User.layout.Resetpass')->with(compact('data'));
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
        $user =User::find($id);
        if(!(Hash::check($request->get('password_old'),Auth::guard('customer')->user()->password))){
            return back()->with('messages','Mật Khẩu cũ không đúng');
        }
        if(strcmp($request->get('password_old'),$request->get('password'))==0){
            return back()->with('messages','Mật Khẩu');
        }
        $user->password =bcrypt($data['password']);
        $user->save();
        return redirect()->route('reset.edit',Auth::guard('customer')->user()->id)->with('messages','Đổi mật khẩu thành công');
    }

    public function destroy($id)
    {
        //
    }
}
