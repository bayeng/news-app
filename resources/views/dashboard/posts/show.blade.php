@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2>{{ $post->title }}</h2>
            <a href="" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span>Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('are you sure ?')"><span data-feather="trash-2" class="align-text-bottom"></span>Delete</button>
            </form>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to My Post</a>
            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img class="mt-3" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
                </div>
            @else
                <img class="mt-3" src="https://source.unsplash.com/700x200?{{ $post->category->name }}" alt="{{ $post->category->name }}">
            @endif
            <article>
                {!! $post->body !!}
            </article>

        </div>
    </div>
</div>

@endsection