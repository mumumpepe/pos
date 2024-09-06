@props(['active' => false])
<a {{ $attributes }} class = "{{ $active ? 'opacity-100' : 'opacity-75 hover:opacity-100' }} flex items-center text-white py-2 pl-4 nav-item">
    {{ $slot }}
</a>
