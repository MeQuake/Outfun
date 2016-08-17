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
                @if (count($post->files) > 0)
                <div class="photo-preview">
                    @foreach ($post->files as $file)
                        <div>
                            <img src="/images/{{ $file->name }}" class="img-responsive">
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="panel-footer panel-footer-post">
            <div class="btn-group btn-group-justified btn-footer-post" role="group">
                <div class="btn-group" role="group">
                    <button value="{{ $post->id }}" type="button" class="btn btn-default btn-lg thumb-up-button"><span class="glyphicon glyphicon-thumbs-up green"></span> Fajne</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-heart-empty red"></span> Ulubione</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-comment blue"></span> Skomentuj</button>
                </div>
            </div>
        </div>
    </div>
</div>
