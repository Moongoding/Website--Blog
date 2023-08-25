@extends('layouts.main')
@section('container')
    <h1>Halaman About</h1>

    <h3>{{ $name }} </h3>
    <p> {{ $email }} </p>
    <img src=" {{ $image }} " alt="" width="150" height="150" class="rounded-circle border border-3 border-primary-subtle">
    <script src="js/style.js"></script>
@endsection
