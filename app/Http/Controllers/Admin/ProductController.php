<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\thongSo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::orderBy('created_at','DESC')->paginate(5);
        //TÌM KIẾM THEO KEYWORD
        if ($keyword = request()->keyword) {
            $data = product::orderBy('created_at','DESC')->search()->paginate(5);
        }
        return view('admin.quanlysanpham.product.index', compact('data'));
    }

    public function thongso($id)
    {
        $product = product::find($id);
        $thongSo = thongSo::firstwhere('id_product', $id);
        return view('admin.quanlysanpham.product.thongso',compact('product','thongSo'));
    }
    public function post_thongso( Request $request, $id)
    {
        $thongSo = thongSo::firstwhere('id_product', $id);
        $this->validate($request, [
        ], [
            
        ]);

        $request->offsetUnset('_token');
        if($thongSo!= null){
            thongSo::where('id_product',$id)->update($request->all())->with('success','Cập nhật thành công');
            
        }else{
            thongSo::create($request->all())->with('success','Thêm mới thành công');
        } 
        return redirect()->route('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.quanlysanpham.product.create', compact('cats'));
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
            'name' => 'required|unique:category,name',
            'slug' => 'required|unique:category,slug',
            'category_id' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'sale_price' => 'required|numeric|min:0|lt:price',
        ], [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'slug.required' => 'Tên Slug không được để trống',
            'slug.unique' => 'Tên slug đã tồn tại',
            'category_id.required' => 'Hay lựa chọn danh mục',
            'price.required' => 'Giá không được để trống',
            'price.min' => 'Giá không được bé hơn 0',
            'price.not_in' => 'Giá không được bé hơn 0',
            'sale_price.required' => 'KM không được để trống',
            'sale_price.min' => 'KM không được bé hơn 0',
            // 'sale_price.lt' => 'KM không được lơn hơn giá sản phẩm',
        ]);

        $request->offsetUnset('_token');
        $img = str_replace(url('public/uploads') . '/', '', $request->image);
        $request->merge(['image' => $img]);
        Product::create($request->all());
        return redirect()->route('product.index')->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = product::find($id);
        $thongso = thongSo::where('id_product',$model->id)->first();

        return view('admin.quanlysanpham.product.show',  ['model' => $model, 'thongso' => $thongso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::all();
        $model = product::find($id);
        return view('admin.quanlysanpham.product.edit', ['model' => $model, 'cats' => $cats]);
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
        Product::where(['id' => $id])->update($request->all());
        return redirect()->route('product.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = product::destroy($id);
        return redirect()->back()->with('success','Xóa thành công');
    }
}
