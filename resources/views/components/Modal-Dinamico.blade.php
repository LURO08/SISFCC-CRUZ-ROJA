<link rel="stylesheet" href="{{ asset('css/component/ModalDinamico.css') }}">

<div id="{{ $modalId }}" class="modaldinamico {{ $size ?? 'modal-default' }}">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $title }}</h5>
            <a href="#" class="close">&times;</a>
        </div>
        <div class="modal-body">
            <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Aquí se inserta el contenido dinámico (inputs, selects, etc.) -->
                {{ $slot }}

                <!-- Botones centrados -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
