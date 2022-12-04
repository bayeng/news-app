@extends('layouts.main')

@section('container')
    <h1 class="mb-5">List Category</h1>
    <div class="container">
        <div class="row">
                @foreach ($categories as $category)      
                     <div class="col-md-4">
                        <div class="card text-bg-dark">
                            <img src="https://source.unsplash.com/1200x400?{{ $category->name }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="position-absolute px-2 py-1" style="background-color: rgba(0,0,0,0.7)" >
                                    <a class="text-decoration-none text-white" href="blog?category={{ $category->slug }}"><h5 class="card-title">{{ $category->name }}</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

@endsection