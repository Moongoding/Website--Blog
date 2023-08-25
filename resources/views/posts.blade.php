@extends('layouts.main')
@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts" method="GET">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search"
                    value="{{ request('search') }}">
                <button class="btn btn-outline-info" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if($posts->count())
<div class="card mb-3 border-bottom">
    @if ($posts[0]->image)
    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top"
        alt="{{ isset($posts[0]->category) ? $posts[0]->category->name : 'Category has been deleted' }}"
        style="max-height: 400px; overflow:hidden;">
    @else
    <img src="https://source.unsplash.com/900x400?{{ isset($posts[0]->category) ? $posts[0]->category->name : 'Category has been deleted' }}"
        class="card-img-top" alt="{{ isset($posts[0]->category) ? $posts[0]->category->name : 'Category has been deleted' }}">
    @endif
    <div class="card-body text-center">
        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                {{ $posts[0]->title }} </a></h3>
        <p>
            <small class="text-body-secondary text-capitalize">
                By <a href="/posts?author={{ $posts[0]->author->username }}"
                    class="text-decoration-none">{{ $posts[0]->author->name }}</a> in
                @if ($posts[0]->category)
                <a href="/posts?category={{ $posts[0]->category->slug }}"
                    class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                @else
                <a href="#"
                    class="text-decoration-none">Category has been deleted</a>
                @endif
                {{ $posts[0]->created_at->diffForHumans() }}
            </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-outline-info text-black">Read
            More</a>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="position-absolute px-3 py-2"
                    style="background-color: rgba(0, 21, 24, 0.647); border-radius: 0px 10px 10px 3px">
                    @if ($post->category)
                    <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">
                        {{ $post->category->name }}</a>
                    @else
                    <a href="#" class="text-white text-decoration-none">
                        Category has been deleted</a>
                    @endif
                </div>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                    alt="{{ isset($post->category) ? $post->category->name : 'Category has been deleted' }}"
                    style="max-height: 190px; overflow:hidden;">
                @else
                <img src="https://source.unsplash.com/600x400?{{ isset($post->category) ? $post->category->name : 'Category has been deleted' }}"
                    class="card-img-top"
                    alt="{{ isset($post->category) ? $post->category->name : 'Category has been deleted' }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>
                        <small class="text-body-secondary text-capitalize">
                            By <a href="/posts?author={{ $post->author->username }}"
                                class="text-decoration-none">{{ $post->author->name }}</a><br>
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text serif">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<P class="text-center fs-4">No Post Found.</P>
@endif

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>

@endsection
