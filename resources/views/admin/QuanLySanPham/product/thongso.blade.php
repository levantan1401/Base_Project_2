@extends('layout.admin')
@section('title', 'Thông số kĩ thuật')
@section('main')
<?php
$images = json_decode($product->list_image);
$mess = '';
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-5 text-center">
                <img src="{{ url('public/uploads')}}/{{$product->image}}" alt="Anh" style="width: 100%;">
                @if(is_array($images))
                <hr>
                <div class="row">
                    @foreach($images as $image)
                    <div class="col-md-4">
                        <img src="{{$image}}" alt="Anh_con" width="100%">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">THÔNG SỐ KĨ THUẬT</h5>
                        <b>{{ $product->name }}  <span class="badge badge-success">{{ $product->color }}</span></b>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="id_product" value="{{ $product->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Dài x Rộng x Cao</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="dai_rong_cao" value="<?php if($mess = ($thongSo!=null) ? "$thongSo->dai_rong_cao" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">mm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Động cơ</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="dongCo" value="<?php if($mess = $thongSo!=null ? "$thongSo->dongCo" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">L</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Chiều dài cơ sở</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="chieuDaiCS" value="<?php if($mess = $thongSo!=null ? "$thongSo->chieuDaiCS" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">mm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="my-input">Công suất tối đa</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="congSuatMax" value="<?php if($mess = $thongSo!=null ? "$thongSo->congSuatMax" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">HP</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="my-input">Khoảng sáng gầm</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="khoangSangGam" value="<?php if($mess = $thongSo!=null ? "$thongSo->khoangSangGam" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">mm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Mô men xoắn cực đại</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="moMemXoan" value="<?php if($mess = $thongSo!=null ? "$thongSo->moMemXoan" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Nm</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="my-input">Dung tích nhiên liệu</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="dungTichNL" value="<?php if($mess = $thongSo!=null ? "$thongSo->dungTichNL" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">L</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="my-input">Hộp số</label>
                                        <input id="my-input" class="form-control" type="text" name="hopSo" value="<?php if($mess = $thongSo!=null ? "$thongSo->hopSo" : ""); echo($mess);?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="my-input">Mức tiêu thụ nhiên liệu</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input id="my-input" class="form-control" type="text" name="mucTieuThuNL" value="<?php if($mess = $thongSo!=null ? "$thongSo->mucTieuThuNL" : ""); echo($mess);?>">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">lít/100KM</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="my-input">Dẫn động</label>
                                        <input id="my-input" class="form-control" type="text" name="danDong" value="<?php if($mess = $thongSo!=null ? "$thongSo->danDong" : ""); echo($mess);?>">
                                    </div>
                                </div>
                            </div>
                            <div class="submit text-right ">
                                <button class="btn btn-primary w-25"> Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()