@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">
        <h1>Produk Image Show</h1>
        <img src="{{ asset('storage/productimage/' . $productimage->image )}}" alt="{{ $productimage->image}}">

        <h2>{{ $productimage->name }}</h2>
        <h3>{{ $productimage->description }}</h3>
    </main><!-- End #main -->
@endsection
