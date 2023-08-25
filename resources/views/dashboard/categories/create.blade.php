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
    <form method="post" action="/dashboard/categories" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 mb-2">
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="name" autofocus value="{{ old('name') }}">
                    <label for="name">Nama Category</label>
                    @error('name')
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

const name = document.querySelector('#name');
const slug = document.querySelector('#slug');

name.onkeyup = function() {
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
};

</script>

@endsection
