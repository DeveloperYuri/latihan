@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <h1>Daftar Isi Produk</h1>
        <h1>{{ $product->name }}</h1>
        <h2>{{ $product->description }}</h2>

    </main><!-- End #main -->
@endsection
