@extends('layout.admin')
@section('title', 'Thêm Quản lý')
@section('main')
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <h2 class="text-center">@yield('title')</h2>
    <a href="{{Route('account.index')}}" class="btn btn-primary" style="margin-left: 20px;height: 40px;width: 100px;">Quay Lại</a>
    <div class="container">
    <div class="card-body">
                 @if ($errors->any())
                <div class="alert alert-danger">
                        <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                    @endforeach
                    </ul>
               </div>
                @endif
                @if (session('messages'))
                <div class="alert alert-success" role="alert">
                    {{ session('messages') }}
                </div>
                @endif
         </div>
        <form action="{{ Route('account.store') }}" method="post" >
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Avatar</label>
                <input type="file" class="form-control-file"  name="avatar" >
             </div>
            <div class="form-group" >
                <label for="">Name</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control"aria-describedby="helpId">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="text" class="form-control" id="inputPassword4" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="">Số Điện Thoại</label>
                <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control"aria-describedby="helpId">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Chức Vụ</label>
                    <select class="form-select" aria-label="Default select example" style="height:30px" name="chucvu">
                        <option>Nhân Viên</option>
                        <option>Quản Lý</option>
                    </select>
                </div>
            </div>
            <input type="submit" name="Them" value="Thêm" class="btn btn-primary" style="margin-left: 30%;height: 40px;width: 150px;">
        </form>
    </div>
@stop()
