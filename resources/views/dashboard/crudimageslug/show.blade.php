@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">
        <h1>Produk Image Show</h1>
        <img src="{{ asset('storage/productimageslug/' . $productimageslug->image )}}" alt="{{ $productimageslug->image}}" width="500px">

        <h2>{{ $productimageslug->name }}</h2>
        <h3>{{ $productimageslug->description }}</h3>
    </main><!-- End #main -->
@endsection
