{{-- resources/views/products/create.blade.php --}}
<x-layouts.app-layout title="Create Product">
    <h1 class="text-xl font-bold mb-4">Create Product</h1>

    <form action="{{ route('productcomponent.store') }}" method="POST">
        @csrf
        <x-input label="Name" name="name" />
        <x-input label="Deskripsi" name="description" />

        <x-button>Simpan</x-button>
    </form>
</x-layouts.app-layout>


