{{-- resources/views/components/button.blade.php --}}
<button
    type="{{ $attributes->get('type') ?? 'submit' }}"
    {{ $attributes->merge(['class' => 'bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700']) }}>
    {{ $slot }}
</button>
