<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class SendmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Contact::orderBy('created_at','DESC')->paginate(10);
        if($keyword = request()->keyword){
            $data = Contact::orderBy('created_at','DESC')->search()->paginate(10);
        }
        return view('admin.Mail.index')->with(compact('data', $data));
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
        $data = Contact::find($id);
        return view('admin.Mail.send')->with(compact('data',$data));

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
        $data = Contact::find($id);
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $data->status='1';
        $data->save();
        $email_admin = Auth::user()->name;
        Contact::where(['id'=>$id])->update($request->all());
        $email   =  $request->get('email');
        $content = $request->get('admin_send');
        $name = $request->get('name');
        Mail::send('mail.contact',[
            'name' => $name,
            'content' =>$content,
        ], function($mail) use($email, $name, $content,$email_admin){
            $mail->to($email);
            $mail->from('banhangxevinfast@gmail.com',$email_admin);
            $mail->subject('🌟 Tập Đoàn Kinh Doanh Xe Oto VinFast Thông Báo🌟');
        });
        // return redirect()->route('category.index');
        // Contact::where(['id'=>$id])->update($request->all());
        return redirect()->route('qlthu.index')->with('success','Gửi thành công thành công');
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
    public function send_mail(Request $request,$id){
       $data = Contact::find($id);
       $data->status = $request->input(1);
       $data->admin_send = $request->input('admin_send');
       dd($data);
    }
    public function submit(Request $request){


    }
}
