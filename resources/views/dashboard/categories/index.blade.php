@extends('dashboard.layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Manajement Categories</h1>
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
                        <table class="table align-middle datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td class="align-midle">
                                        <a href="/dashboard/categories/create" class="badge bg-info"><span class="ri-add-circle-line"></span></a>
                                        <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><span class="ri-edit-box-line"></span></a>
                                        <form action="/dashboard/categories/{{ $category->id }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are You Sure ?')">
                                                <span class="bi bi-trash"></span>
                                            </button>
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
