@extends('layout.admin')
@section('title', 'Quản Lý Ảnh')
<!-- Phần này để quản lý ảnh tròn product hay các ảnh được đưa lên filemanager. -->
@section('main')
    <div class="card">
        <div class="card-body">
            <iframe src="{{ url('file')}}/dialog.php" frameborder="0" style="width: 100%; height: 700px; overflow-y: auto;"></iframe>
        </div>
    </div>
@stop()