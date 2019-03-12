<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('products.update')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" name="Descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="">Precio</label>
                        <input type="number" class="form-control" name="Precio" required>
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" class="form-control" name="Stock" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo Mueble</label>
                        <input type="text" class="form-control" name="TipoMueble" required>
                    </div>
                    <div class="form-group">
                        <label for="Imagen">Imagen</label>
                        <input type="file" class="form-control{{ $errors->has('Imagen') ? ' is-invalid' : '' }}" id="Imagen" name="Imagen" accept=".png, .jpg, .jpeg" style="border: none" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>