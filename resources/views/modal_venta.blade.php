<!-- El Modal -->
<div class="modal fade" id="modalVenta" tabindex="-1" aria-labelledby="Formulario de compra">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalVentaTitle">Formulario de compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del modal -->
            <div class="modal-body">

                <form>
                    <input type="hidden" name="funcion_id" id="funcion_id">
                    <div class="mb-3">
                        <label class="form-label">Nombre cliente</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo silleteria</label>
                        <textarea class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </form>

            </div>

            <!-- Pie del modal-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>

        </div>
    </div>
</div>
