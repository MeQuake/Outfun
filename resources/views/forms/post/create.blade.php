@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">Dodawanie postu</div>
            <div class="panel-body">
                <form action="{{ url('/post') }}" class="dropzone">
                    {{ csrf_field() }}
                    <!-- Now setup your input fields -->
                    <div class="form-group">
                        <label>Tytuł</label>
                        <input name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Opis</label>
                        <textarea name="content" class="form-control" rows="5"></textarea>
                    </div>

                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Dodaj zdjęcia</span>
                    </span>
                    <span class="btn btn-primary addPost">
                        <span>Dodaj wpis</span>
                    </span>
                    <div class="slider"><div class="dz-message"></div></div>
                </form>
            </div>
</div>

    </div>

    <div class="col-sm-4">
    </div>
</div>
@endsection
