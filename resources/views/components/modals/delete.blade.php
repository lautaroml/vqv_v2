<!-- Modal Structure -->
<form method="POST" action="{{ $form_action }}" accept-charset="UTF-8">
<div id="modal1" class="modal">
    <div class="modal-content">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">

            <div class="color-line"></div>
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡Atención!
                </h4>
            </div>
            <div class="modal-body">
                {{ $message }}
                <small class="font-bold">Todos los registros que dependan del mismo serán eliminados tambien</small>
            </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <input type="submit" class="btn btn-danger" value="Si, Eliminar" />
    </div>
</div>
</form>