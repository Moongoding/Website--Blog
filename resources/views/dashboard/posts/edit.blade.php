@extends('dashboard.layouts.main')

@section('container')

<div class="pagetitle mb-5">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard" class="{{ Request::is('dashboard') ? 'active': '' }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/posts" class="{{ Request::is('dashboard/posts') ? 'active': '' }}">Article</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/posts/create" class="{{ Request::is('dashboard/posts/create') ? 'active': '' }}">Create</a></li>
        </ol>
    </nav>
</div>

<div class="container">
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-lg-6 mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        placeholder="title" autofocus value="{{ old('title', $post->title) }}" required>
                    <label for="title">Title</label>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        placeholder="slug" value="{{ old('slug', $post->slug) }}">
                    <label for="slug">Slug</label>
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 mb-3">
                <label for="category" class="form-label">Pilih Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 mb-5">
                <label for="image" class="form-label">Upload Image</label>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row justify-content-md-center">
            <img src="{{ $post->image ? asset('storage/' . $post->image) : '' }}" class="img-preview img-fluid mb-3 col-md-5">
        </div>

        <div class="d-flex justify-content-center">
            <div class="form-floating col-lg-12 mb-3">
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea class="form-control @error('body') is-invalid @enderror" id="editor" name="body">{{ old('body', $post->body) }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary col-lg-12">Update</button>
        </div>
    </form>
</div>

<script>
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.onkeyup = function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
};

function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>

@endsection
