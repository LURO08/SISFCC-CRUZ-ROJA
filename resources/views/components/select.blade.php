@props(['options', 'name', 'id', 'selected' => null, 'dato' => 'Seleccione una opción',  'label' => null, 'required' => false, 'showFormOn' => 'doctor'])

<div x-data="selectComponent()" class="relative mt-4">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif

    <button type="button" @click="toggleDropdown()" @keydown.enter="toggleDropdown()" @keydown.escape="closeDropdown()"
        class="w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 sm:text-sm"
        :class="{ 'border-red-500': open || selectedValue }">
        <span class="block truncate" x-text="getSelectedText()"></span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pt-5 pointer-events-none">
            <svg class="h-10 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 011.414 0L10 11.414l3.293-3.707a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </span>
    </button>

    <ul x-show="open" @click.away="closeDropdown()" @keydown.escape.window="closeDropdown()"
        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
        @foreach($options as $value => $text)
            <li @click.prevent="selectOption('{{ $value }}', '{{ $text }}')"
                :class="{ 'border-l-2': selectedValue === '{{ $value }}', 'border-red-500': open }"
                class="cursor-pointer select-none relative py-2 pl-3 pr-9 text-gray-900 hover:bg-red-500 hover:text-white hover:border-red-500 hover:border-l-2">
                {{ $text }}
            </li>
        @endforeach
    </ul>

    <input type="hidden" name="{{ $name }}" :value="selectedValue">
</div>

<script>
    function selectComponent() {
        return {
            open: false,
            selectedValue: @json($selected),
            selectedText: '',
            showFormOn: @json($showFormOn),
            dato: @json($dato),

            init() {
                this.selectedText = this.getInitialSelectedText();
            },

            toggleDropdown() {
                this.open = !this.open;
            },

            closeDropdown() {
                this.open = false;
            },

            selectOption(value, text) {
                this.selectedValue = value;
                this.selectedText = text;
                this.closeDropdown();
                this.showForm();
            },

            getInitialSelectedText() {
                return this.selectedValue ? @json($options)[this.selectedValue] : this.dato;
            },

            getSelectedText() {
                return this.selectedText || this.dato;
            },

            showForm() {
                if (this.selectedValue === this.showFormOn) {
                    document.querySelector('#hidden-form').classList.remove('hidden');
                } else {
                    document.querySelector('#hidden-form').classList.add('hidden');
                }
            }
        }
    }
</script>

<style>
    .hover:border-red-500 {
        border-color: #f87171; /* Rojo para el borde en hover */
    }
</style>
