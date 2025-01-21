@props(['href', 'active' => false])

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => $active ? 'text-white font-bold underline' : 'text-gray-300 hover:text-white']) }}>
    {{ $slot }}
</a>
