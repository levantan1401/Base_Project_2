@extends('layout.admin')
@section('title', 'Thêm danh Mục')
@section('main')

<div class="card">
    <div class="card-body">
        <p class="card-title text-center" style="font-size: 32px; ">@yield('title')</p>
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
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" onkeyup="ChangeToSlug()" placeholder="Enter Category Name" aria-describedby="helpId">
                    <div class="error" style="color: red;">
                        @if($errors->has('name'))
                        {{$errors->first('name')}}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Category Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Category Slug" aria-describedby="helpId" readonly>
                </div>
                <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Status
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Private
                    </label>
                </div> -->
                <div class="form-group w-25">
                    <label for="exampleInputEmail1">Category Status</label>
                    <select name="status" class="custom-select">
                        <option value="2"></option>
                        <option value="0">Private</option>
                        <option value="1">Publish</option>
                    </select>
                </div>
                <div class="submit text-center">
                    <input type="submit" name="them" value="Thêm" class="btn btn-primary w-25 ">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function ChangeToSlug() {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("name").value;
        var y = document.getElementById('slug');
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        y.value = slug;
    }
</script>
<script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-blue", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " w3-blue";
    }
</script>
@stop()