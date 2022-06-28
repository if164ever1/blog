@extends("components.layout")


@section("content")
    <article>
        <h1>{{$post->title}}</h1>
        <p>
            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
            <p><a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }} category</a></p>
         </p>
        <div><?= $post->body ?></div>
        <p><a href="/">Go back</a></p>
    </article>
@endsection



