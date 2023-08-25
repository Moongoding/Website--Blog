@extends('dashboard.layouts.main')

@section('container')
<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard" class="{{ Request::is('dashboard') ? 'active': '' }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/posts" class="{{ Request::is('dashboard/posts') ? 'active': '' }}">Article</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/posts/create" class="{{ Request::is('dashboard/posts/create') ? 'active': '' }}">Create</a></li>
        </ol>
    </nav>
</div>
<br>

@if (session()->has('Success'))
<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
    {{ session('Success') }} <i class='bx bx-check bx-tada'></i>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="main">
    <div class="row"></div>
    <h2 class="h2 align-content-center"> This You Article, {{ auth()->user()->name }}</h2>
    <a href="/dashboard/posts/create" class="btn btn-primary mb-4">Create New Post</a>


    <div class="table-responsive">

        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col" style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ isset($post->category) ? $post->category->name : 'Categoty telah di hapus' }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span class="bi bi-eye"></span></a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span class="ri-edit-box-line"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure ?')"><span class="bi bi-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
