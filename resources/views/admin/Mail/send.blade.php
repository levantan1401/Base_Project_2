@extends('layout.admin')
@section('title', 'Trả Lời Khách Hàng')
@section('main')

<head>
    <style>
    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #f00d0d;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #09adee;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    </style>
</head>
<div class="card">
    <p class="card-title text-center" style="font-size: 32px; ">@yield('title')</p>
    <div class="search mb-2">
        <a href="{{route('qlthu.index')}}" class="btn btn-success text-left" style="margin-left:40px">Quay lại</a>
    </div>
</div>
<div class="container">
    <form action="{{Route('qlthu.update',$data->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div class="col-25">
                <label for="fname">Gửi tới Khách hàng</label>
            </div>

            <div class="col-75">
                <input type="text" id="fname" name="email" value="{{$data->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="subject">Góp ý</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="admin_send" placeholder="Trả lời khách hàng..."
                    style="height:200px"></textarea>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Gửi về mail" style="width: 120px;margin-left:300px">
        </div>
    </form>
</div>
@stop()
