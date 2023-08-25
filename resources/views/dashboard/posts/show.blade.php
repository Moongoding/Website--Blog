@extends('dashboard.layouts.main')

@section('container')
<div class="main">
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-8">
                <h2 class="mb-2">{{ $post->title }}</h2>

                <div class=" text-center mb-3">
                    <a href="/dashboard/posts" class="btn btn-success"> <i class="bi bi-back"></i>
                        Back To My Posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"> <i
                            class="ri-edit-box-line"></i>
                        Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><span
                                class="bi bi-trash"></span>Delete</button>
                    </form>
                </div>
                @if ($post->image)
                    <div style="max-height: 300px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/680x300?{{ $post->category->name }}" class="img-fluid"
                        alt="{{ $post->category->name }}">
                @endif

                <article class="my-3 serif fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
</div>
@endsection
