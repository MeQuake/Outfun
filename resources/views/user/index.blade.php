@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <b>{{ $user->name }}</b>
            </div>
            <div class="panel-body">
                opis / inne
            </div>
        </div>
    </div>
    <div class=" col-sm-8">
        @foreach ($user->posts as $post)
        <div>
            @include('post.content')
        </div>
        @endforeach
    </div>
</div>
@endsection
