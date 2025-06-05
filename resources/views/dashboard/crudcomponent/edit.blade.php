{{-- resources/views/products/create.blade.php --}}
<x-layouts.app-layout title="Create Product">
    <h1 class="text-xl font-bold mb-4">Create Product</h1>

    <form action="{{ route('productcomponent.update', $productcomponent->slug) }}" method="POST">
        @method('PUT')
        @csrf
        <x-input label="Name" name="name" :value="$productcomponent->name" />
        <x-input label="Deskripsi" name="description" :value="$productcomponent->description" />

        <x-button>Update</x-button>
    </form>
</x-layouts.app-layout>


