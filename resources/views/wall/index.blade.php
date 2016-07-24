@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" col-sm-8">
        @foreach ($posts as $post)
        <div>
            @include('post.content')
        </div>
        @endforeach
    </div>

    <div class="col-sm-4">
        @include('sidebars.favourite')
    </div>
</div>
@endsection
