<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Admin::orderBy('created_at','DESC')->paginate(10);
        //TÌM KIẾM THEO KEYWORD
        if($keyword = request()->keyword){
            $data = Admin::orderBy('created_at','DESC')->search()->paginate(10);
        }
        return view('admin.Account.Admin.index')->with(compact('data', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Account.Admin.create');
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
        $data = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'avatar'=>'required',
            'chucvu' => 'required',
            'phone'=>'required',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạnh email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'chucvu.required' => 'Bạn chưa nhập chức vụ vào',

        ]);
        $request->offsetUnset('_token');
        $img = str_replace(url('public/uploads') . '/', '', $request->avatar);
        $request->merge(['avatar' => $img]);
        admin::create($request->all());
        return redirect()->back()->with('messages', 'Chúc mừng bạn đã đăng ký thành công');
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
        return view('admin.Account.Admin.edit')->with(compact('data'));
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
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $img = str_replace(url('public/uploads/Avatar') . '/', '', $request->avatar);
        $request->merge(['avatar' => $img]);
        admin::where(['id' => $id])->update($request->all());
        return redirect()->route('account.index')->with('success','Cập nhật thành công');
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
        admin::find($id)->delete();
        return redirect()->back()->with('status','Xoá thành công');
    }
}
