@props(['active'])

@php
    // Definir clases base para el enlace
    $baseClasses = 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white-900 transition duration-150 ease-in-out';

    // Determinar las clases adicionales basadas en el estado activo
    $activeClasses = $active
        ? 'border-b-2 border-white-400 focus:outline-none focus:border-white-900'
        : 'border-b-2 border-transparent  hover:border-gray-300 focus:outline-none';

    // Combinar clases base y adicionales
    $classes = "{$baseClasses} {$activeClasses}";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
