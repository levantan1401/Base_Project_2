<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'images' => 'required',
            'noi_dung' => 'required',
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'images.required' => 'Ảnh không được để trống',
            'noi_dung.required' => 'Nội dung không được để trống',
        ]);

        $request->offsetUnset('_token');
        $img = str_replace(url('public/uploads') . '/', '', $request->images);
        $request->merge(['images' => $img]);
        Banner::create($request->all());
        return redirect()->route('banner.index')->with('success','Thêm mới thành công');
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
        $model = Banner::find($id);
        return view('admin.banner.update', ['model' => $model]);
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
        // BỎ TRƯỜNG DỮ LIỆU KHI CẬP NHẬT
        $request->offsetUnset('_token');
        $request->offsetUnset('_method');
        $img = str_replace(url('public/uploads') . '/', '', $request->image);
        $request->merge(['image' => $img]);
        // dd($request->all());
        // $request->only('name','status');
        Banner::where(['id' => $id])->update($request->all());
        return redirect()->route('banner.index')->with('success','Cập nhật thành công');
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
