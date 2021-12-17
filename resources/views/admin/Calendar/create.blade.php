@extends('layout.admin')
@section('title', 'Nhiệm Vụ')
@section('main')
<div class="card">
    <div class="card-title text-center">
        <h3>
            @yield('title')
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('calendar.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Chủ Đề:</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Nhiệm Vụ" aria-describedby="helpId">
                        <div class="error" style="color: red;">
                            @if($errors->has('name'))
                            {{$errors->first('name')}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả:</label>
                        <textarea name="note" class="form-control" rows="10">Mô tả Nhiệm vụ</textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Nhân Viên:</label>
                        <select name="id_staff" class="form-control">
                            <option value="">Chọn Nhân Viên</option>
                            @foreach($staff as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="error" style="color: red;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày:</label>
                        <input type="datetime-local" name="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái:</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="" value="0" checked />
                                Đã Xử Lý
                            </label>
                            <label>
                                <input type="radio" name="status" id="" value="1" checked />
                                Chưa Xử Lý
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@stop()
@section('js')



@stop()