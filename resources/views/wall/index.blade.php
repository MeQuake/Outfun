@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" col-sm-8">
        @foreach ($posts as $post)
            <div>
                <div class="panel panel-default panel-post">
                    <div class="panel-heading panel-post clearfix">
                        <b>{{ $post->title}}</b> <small>@dupa</small>
                        <div class="pull-right">
                            ocena / data dodania
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-offset-1 col-sm-10">
                            <img src="/images/{{ $post->hash }}.jpg" class="img-responsive" alt="{{ $post->title }}">
                        </div>
                    </div>
                    <div class="panel-footer panel-footer-post">
                        <div class="btn-group btn-group-justified btn-footer-post" role="group" aria-label="Justified button group">
                            <a href="#" class="btn btn-default btn-lg btn-footer-post" role="button"><span class="glyphicon glyphicon-thumbs-up green"></span> Fajne</a>
                            <a href="#" class="btn btn-default btn-lg btn-footer-post" role="button"><span class="glyphicon glyphicon-heart-empty red"></span> Ulubione</a>
                            <a href="#" class="btn btn-default btn-lg btn-footer-post" role="button"><span class="glyphicon glyphicon-comment blue"></span> Skomentuj</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <div class="col-sm-4">
    <div class="panel panel-default panel-post">
        <div class="panel-heading">
            <b>Reklama / Polecane</b>
        </div>
        <div class="panel-body">
            <div class="col-sm-offset-1 col-sm-10">
                <img src="/images/nope.jpg" class="img-responsive" alt="Cinque Terre">
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
