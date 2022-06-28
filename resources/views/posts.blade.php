@extends("components.layout")


@section("content")

   @foreach ($posts as $post)
        <article class="{{$loop->even ? 'foobar' : ''}}">
            <a href="/posts/{{$post->slug}}">
                <h1>
                    {{$post->title}}
                </h1>
            </a>
                <!--{{$post->excerpt}}-->
                <p>
                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    <a href="/categories/{{ $post->category->slug }}"> in category {{ $post->category->name }} </a>
                 </p>
                <div>
                    {{ $post->excerpt }}
                </div>
        </article>
    @endforeach
@endsection

