<div class="modal-body">
    <input type="hidden" name="id" id="id" class="form-control">
    <div class="form-group row">
        <div class="col-md-12">
        <label class="form-control-label" for="codigo">CODIGO</label>
        <input type="text" name="codigo" id="codigo" class="form-control" required placeholder="Ingrese un codigo">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class="form-control-label" for="nombre">NOMBRE</label>
            <input type="descripcion" class="form-control" id="nombre" name="nombre" required placeholder="Nombre de la actividad">
        </div>
        <div class="col-md-12">
            <label class="form-control-label" for="descripcion">Descripcion</label>
            <input type="descripcion" class="form-control" id="descripcion" name="descripcion" required placeholder="Escriba una descripcion">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="btn">Editar</button>
</div>
