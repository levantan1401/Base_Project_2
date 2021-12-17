@extends('layout.admin')
@section('title', 'Password')
@section('main')
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
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Settings</h1>
        <div class="row">
            <div class="col-md-3 col-xl-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Settings</h5>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list" role="tab">
                            Password</a>
                        <a class="list-group-item list-group-item-action"
                            href="{{route('profile.edit',$data->id)}}">Account </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xl-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Đổi Mật Khẩu</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('resetmk.update', $data->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="labels">Mật Khẩu Cũ</label>
                                                <input type="password" name="password_old" class="form-control">

                                            </div>
                                            <div class="mb-3">
                                                <label class="labels">Mật Khẩu Mới</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="labels">Nhập Lại Mật Khẩu</label>
                                                <input type="password" name="passwordConfirmation" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Lưu Mật Khẩu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop()
