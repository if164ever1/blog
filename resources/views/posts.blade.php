@extends("components.layout")


@section("content")

@include('_posts-header')


<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card></x-post-featured-card>
    <div class="lg:grid lg:grid-cols-2">
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>
    </div>

    <div class="lg:grid lg:grid-cols-3">
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>
        <x-post-card></x-post-card>


    </div>
</main>

   {{-- @foreach ($posts as $post)
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
    @endforeach  --}}
@endsection

