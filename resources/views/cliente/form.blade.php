<div class="form-group row">
    <label class="col-md-2 form-control-label" for="text-input">Nro. CI</label>
    <div class="col-md-4">
        <input type="number" name="ci" id="ci" class="form-control" placeholder="#######" required pattern="{0,30}$">
        
    </div>
    <label class="col-md-2 form-control-label" for="text-input">Telefono</label>
    <div class="col-md-4">
        <input type="number" name="telefono" id="telefono" class="form-control" placeholder="+591 ### ## ###" pattern="[0-9]{0,15}">
        
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 form-control-label" for="des">Nombres</label>
    <div class="col-md-10">
    <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Ingrese el nombre">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 form-control-label" for="des">Apellido Paterno</label>
    <div class="col-md-4">
    <input type="text" name="apellido_pat" id="apellido_pat" class="form-control"required placeholder="Ingrese el apellido paterno">
    </div>
    <label class="col-md-2 form-control-label" for="des">Apellido Paterno</label>
    <div class="col-md-4">
    <input type="text" name="apellido_mat" id="apellido_mat" class="form-control" required placeholder="Ingrese el apellido materno">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 form-control-label" for="telefono">Correo</label>
    <div class="col-md-10">
    <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese el correo">    
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
</div>