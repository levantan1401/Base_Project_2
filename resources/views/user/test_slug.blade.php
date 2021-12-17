@extends('user.site')
@section('main')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">TEST SLUG</h5>
        <p class="card-text"></p>
        @foreach($cats as $cat)
            <p>{{ $cat->name }}</p>
        @endforeach
    </div>
</div>


@stop()