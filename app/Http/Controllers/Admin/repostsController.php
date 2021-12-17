<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\baohong;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class repostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $baohong = baohong::with('product','getUser')->get();
        // return $baohong;
        return view('admin.Repost.index')->with(compact('baohong'));
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
         $data =baohong::with('getUser')->find($id);


        return view('admin.Repost.send')->with(compact('data'));
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
        $data =baohong::with('getUser')->find($id);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $name = $data->getUser->name;
        $content = $request->content;
        $email_user = $request->email;
        $data->status='1';
        $data->save();
        $email_admin = Auth::user()->name;
        Mail::send('mail.baohong',[
            'name' => $name,
            'content' =>$content,
        ], function($mail) use($email_user, $name, $content,$email_admin){
            $mail->to($email_user);
            $mail->from('banhangxevinfast@gmail.com',$email_admin);
            $mail->subject('🌟 Tập Đoàn Kinh Doanh Xe Oto VinFast Thông Báo🌟');
        });
        return redirect()->route('qlbaohong.index')->with('success','Gửi thành công thành công');

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
