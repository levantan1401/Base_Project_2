<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('created_at','DESC')->paginate(5);
        //TÌM KIẾM THEO KEYWORD
        if ($keyword = request()->keyword) {
            $post = Post::orderBy('created_at','DESC')->search()->paginate(5);
        }
        return view('admin.Post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.Post.create');
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
            'briefInfo' => 'required',
            'tags' => 'required',
            'image' => 'required',
            'content' => 'required',
            'status' => 'required',
            'thutuhienthi' => 'required',
            'vitrihienthi' => 'required'
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'briefInfo.required' => 'Giới thiệu ngắn gọn không được để trống',
            'tags.required' => 'Hastags không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'thutuhienthi.required' => 'Thứ tự hiện thị không được để trống',
            'vitrihienthi.required' => 'Vị trí hiện thị không được để trống',
        ]);
        $vitri = json_encode($request->vitrihienthi);
        $request->offsetUnset('_token');
        $img = str_replace(url('public/uploads') . '/', '', $request->image);
        $request->merge(['image' => $img]);
        $request->merge(['vitrihienthi' => $vitri]);
        
        Post::create($request->all());
        return redirect()->route('post.index')->with('success','Thêm mới thành công');

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

        $model = Post::find($id);
        return view('admin.Post.update', ['model' => $model]);

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
        Post::where(['id' => $id])->update($request->all());
        return redirect()->route('post.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Post::destroy($id);
        return redirect()->back()->with('success','Xóa thành công');
    }
}
