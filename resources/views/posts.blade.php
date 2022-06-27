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
                   <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
                </p>
                <div>
                    {{ $post->excerpt }}
                </div>
        </article>
    @endforeach
@endsection

