<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('created_at','DESC')->paginate(10); 
        //TÌM KIẾM THEO KEYWORD
        if($keyword = request()->keyword){
            $data = Category::orderBy('created_at','DESC')->search()->paginate(10);
        }
        return view('admin.quanlysanpham.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.quanlysanpham.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'name' =>'required|max:255',
            'slug' =>'required',
            'status' =>'required',
       ],
       [
         'status.required' => 'Vui lòng status vào',
         'name.required' =>'Vui lòng thể loại vào',
         'status.required' =>'Vui lòng Kích hoạt vào',
       ] );

       $category = new Category();
       $category->name = $data['name'];
       $category->slug = $data['slug'];
       $category->status = $data['status'];
       $category->save();
       return redirect()->route('category.index')->with('status','Thêm thành công');
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

          $data =Category::find($id);
          return view('admin.quanlysanpham.category.edit')->with(compact('data'));
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
        // Lấy số trường cần lấy xử dụng hàm only
        // $request->only('name','status');
        Category::where(['id'=>$id])->update($request->all());
        return redirect()->route('category.index');
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
        $data = Category::destroy($id); //DELETE 
        return redirect()->back()->with('status','Xoá thành công');   // QUAY LẠI TRANG TRƯỚC ĐÓ
        // category::find($id)->delete();
        // return redirect()->back()->with('status','Xoá thành công');
    }
}
