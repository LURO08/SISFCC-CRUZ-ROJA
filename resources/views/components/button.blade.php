<button {{ $attributes->merge([
    'type' => 'submit',
    'class' =>
    'inline-flex justify-center items-center px-6 py-3 bg-black text-white font-bold text-sm uppercase
    tracking-wide rounded-lg shadow-md hover:shadow-lg hover:bg-gray-800 focus:outline-none focus:ring-2
    focus:ring-offset-2 focus:ring-gray-500 disabled:opacity-50 transition-transform transform hover:scale-105 ease-in-out duration-200'
]) }}>
    {{ $slot }}
</button>
