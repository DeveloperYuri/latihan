@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>CRUD Basic</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">General</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <a href="{{ route('crudimagecreate') }}" class="btn btn-primary mb-3">New</a>

        @include('_message')

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CRUD Image Table</h5>

                            <!-- Default Table -->
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        {{-- <th>No</th> --}}
                                        <th class="text-center">No</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productimage as $index => $p)
                                        <tr>
                                            {{-- <th></th> --}}

                                            <td class="text-center">{{ $productimage->firstItem() + $index }}</td>
                                            <td class="text-center"><img
                                                    src="{{ asset('/storage/productimage/' . $p->image) }}"
                                                    alt="{{ $p->name }}" style="width: 60px"></td>
                                            <td class="text-center">{{ $p->name }}</td>
                                            <td class="text-center">{{ $p->description }}</td>

                                            <td class="text-center">
                                                <form onsubmit="return confirm('apakah anda yakin ingin delete data?')"
                                                    action="{{ route('crudimagedelete', $p->id )}}" method="POST">
                                                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
