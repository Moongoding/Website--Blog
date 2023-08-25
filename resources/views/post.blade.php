@extends('layouts.main')
@section('container')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <h2 class="mb-2">{{ $post->title }}</h2>
            <p>
                By
                @if ($post->author)
                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                @else
                <a href="#" class="text-decoration-none">Author has been deleted</a>
                @endif

                @if ($post->category)
                    in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                @else
                    in <a href="#" class="text-decoration-none">Category has been deleted</a>
                @endif
            </p>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category ? $post->category->name : 'Unknown Category' }}" style="max-height: 400px; overflow: hidden;">
            @else
                <img src="https://source.unsplash.com/680x300?{{ $post->category ? $post->category->name : 'Unknown Category' }}" class="card-img-top" alt="{{ $post->category ? $post->category->name : 'Unknown Category' }}">
            @endif

            <article class="my-3 serif fs-5">
                {!! $post->body !!}
            </article>

            <a href="/" class="d-block mt-3">Back</a>
        </div>
    </div>
</div>
@endsection
