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

        <a href="{{ route('productimageslug.create') }}" class="btn btn-primary mb-3">New</a>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2000, // 2000 ms = 2 detik
                    showConfirmButton: false
                });
            </script>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CRUD Image Slug Table</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th>No</th> --}}
                                        <th class="text-center">No</th>
                                        <th class="text-center">image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productimageslug as $index => $p)
                                        <tr>
                                            {{-- <th></th> --}}
                                            <td class="text-center">{{ $productimageslug->firstItem() + $index }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/productimageslug/' . $p->image)}}" alt="{{ $p->name}}" width="60px">
                                            </td>
                                            <td class="text-center">{{ $p->name }}</td>
                                            <td class="text-center">{{ $p->slug }}</td>
                                            <td class="text-center">{{ $p->description }}</td>

                                            <td class="text-center">
                                                <form action="{{ route('productimageslug.destroy', $p->id) }}" method="POST">
                                                    <a href="{{ route('productimageslug.show', $p->slug )}}" class="btn btn-sm btn-primary">Show</a>
                                                    <a href="{{ route('productimageslug.edit', $p->slug) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete(this.form)">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>

                    @push('scripts')
                        <script>
                            function confirmDelete(form) {
                                Swal.fire({
                                    title: 'Yakin ingin hapus?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Ya, hapus!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        form.submit();
                                    }
                                });
                            }
                        </script>
                    @endpush


                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
