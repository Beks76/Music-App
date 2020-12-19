@foreach($albums as $album)
<div class="col-lg-3">
    <div class="tracks mt-4 mb-4">
        <div class="tracks__item">
            <a href="{{ route('album.show', $album->id) }}">
                @if (Str::startsWith($album->cover, 'http'))
                    <img src="{{ $album->cover }}" alt="">
                @else
                    <img src="/storage/{{$album->cover }}" alt="">
                @endif
            </a>
            <p class="track__text">
                <p>{{ $album->name }} - {{ $album->artist }}</p>
                @foreach ($album->tags()->get() as $tag)
                    <a href=""> #{{$tag->name}}</a>
                @endforeach
            </p>
        </div>
    </div>
</div>
@endforeach