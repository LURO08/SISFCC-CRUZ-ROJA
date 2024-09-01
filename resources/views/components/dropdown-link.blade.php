@props(['active' => false])

@php
    // Definir clases base para el enlace
    $baseClasses = 'block w-full px-4 py-2 text-start text-sm leading-5 transition duration-150 ease-in-out flex items-center';

    // Determinar las clases adicionales basadas en el estado activo
    $activeClasses = $active
        ? 'bg-gray-700 bg-opacity-20 text-white'
        : 'hover:bg-gray-700 hover:bg-opacity-20 text-white-900';

    // Combinar clases base y adicionales
    $classes = "{$baseClasses} {$activeClasses}";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if ($active)
        <!-- Símbolo de fecha cuando el enlace está activo -->
       <span style="font-weight: bold; font-size: 20px; margin-right: 10px;"> > </span>
    @endif
    {{ $slot }}
</a>
