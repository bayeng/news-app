


@extends('layouts.main')

@section('container')

    <h1>{{ $title }}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <form action="/blog">
                        @if (request('category')) 
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                        @endif
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search...">
                            <button class="btn btn-primary" type="submit">Button</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @if ($posts->count())
            <div class="card mb-3">
                @if ($posts[0]->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img class="mt-3" src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $posts[0]->title }}</h3>
                    <small class="text-muted">
                        <p >by <a href="/blog?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> || <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }} </p>
                    </small>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
                </div>
            </div>
    
        
            <div class="container">
                <div class="row">
                    @foreach($posts->skip(1) as $post)
                        <div class="col-md-4">
                            <div class="card mb-3" style="width: 18rem;">
                                <div class="position-absolute px-2 py-1" style="background-color: rgba(0,0,0,0.7)"><a href="" class="text-white text-decoration-none">{{ $post->category->slug }}</a></div>
                                @if ($post->image)
                                    <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                                @else
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <small class="text-muted">
                                        <p >by <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> || <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }} </p>
                                    </small>
                                    <p class="card-text">{{ $post->excerpt }}</p>
                                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @else
     <p class="text-center">posts not found</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection

