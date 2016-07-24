@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" col-sm-8">
        @include('post.content')
    </div>

    <div class="col-sm-4">
        @include('sidebars.favourite')
    </div>
</div>
@endsection
