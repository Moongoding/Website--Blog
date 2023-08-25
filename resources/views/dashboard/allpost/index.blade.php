@extends('dashboard.layouts.main')
@section('container')

<div class="pagetitle">
    <h1>Manajement Posts</h1>
</div>
<br>

<div class="main">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('Success'))
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        {{ session('Success') }} <i class='bx bx-check bx-tada'></i>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allPosts as $post)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ isset($post->category) ? $post->category->name : 'Category has been deleted' }}</td>
                                    <td>{{ isset($post->author) ? $post->author->username : 'Author has been deleted' }}</td>
                                    <td>
                                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span class="bi bi-eye"></span></a>
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
            </div>
        </div>
    </div>
</div>
@endsection
