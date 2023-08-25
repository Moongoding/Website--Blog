@extends('dashboard.layouts.main')

@section('container')

<div class="pagetitle mb-5">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard"
                    class="{{ Request::is('dashboard') ? 'active': '' }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/posts"
                    class="{{ Request::is('dashboard/posts') ? 'active': '' }}">Article</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/posts/create"
                    class="{{ Request::is('dashboard/posts/create') ? 'active': '' }}">Create</a></li>
        </ol>
    </nav>
</div>

<div class="container">
    <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        placeholder="title" autofocus value="{{ old('title') }}">
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
                        placeholder="slug" value="{{ old('slug') }}">
                    <label for="slug" class="form-label">Slug</label>
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
                    @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 mb-5">
                <label for="image" class="form-label">Upload Image</label>
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
                <img class="img-preview img-fluid mb-3 col-md-5">
            </div>

            <div class="d-flex justify-content-center">
                <div class="form-floating col-lg-12 mb-3">
                    {{-- <input id="body" type="text" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor> --}}
                    <textarea class="form-control" id="editor" name="body">{{ old('body') }}</textarea>

                    @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col-lg-12">Create</button>
            </div>
    </form>
</div>

<script>
// const title = document.querySelector('#title');
// const slug = document.querySelector('#slug');

// title.addEventListener('change', function(){
//     fetch('/dashboard/posts/ checkSlug?title=' + title.value)
//     .then(response => response.json())
//     .then(data => slug.value = data.slug)
// });

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
