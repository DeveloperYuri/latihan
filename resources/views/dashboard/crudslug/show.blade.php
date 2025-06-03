@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <h1>Show CRUD Slug</h1>

        <p>{{ $productslug->name}}</p>
        <p>{{ $productslug->slug}}</p>
        <p>{{ $productslug->description}}</p>

    </main><!-- End #main -->
@endsection
