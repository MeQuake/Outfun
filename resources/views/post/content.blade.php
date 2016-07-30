<div>
    <div class="panel panel-default panel-post">
        <div class="panel-heading panel-post clearfix">
            <a href="{{ url('/post/' .$post->id) }} "><b>{{ $post->title }}</b></a>
            <small>@
                @if (isset($post->user->name))
                    <a href="{{ url('/profile/' .$post->user->name) }}">{{ $post->user->name }}</a>
                @else
                    Anonymous
                @endif
            </small>
            <div class="pull-right">
                ocena / {{ $post->created_at->format('d/m/Y') }}
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
