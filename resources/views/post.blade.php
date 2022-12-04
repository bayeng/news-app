
@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                </div>
                @else
                     <img src="https://source.unsplash.com/700x200?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                @endif
 
                <p>
                    by <a href="/blog?author={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> || 
                    <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                </p>
                <article>
                    {!! $post->body !!}
                </article>

                <a href="/blog"> back</a>

            </div>
        </div>
    </div>
    
@endsection