<div class="modal-body">

    <div class="form-group row">
        <div class="col-md-4">
            <label for="ci">NRO. CI</label>
            <input type="number" name="ci" id="ci" class="form-control" placeholder="#######" required
                   pattern="{0,30}$">
        </div>
        <div class="col-md-8">
            <label class="form-control-label" for="nombre">Nombres</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Ingrese el nombre">
        </div>
    </div>
    <input type="hidden" name="id" id="id" class="form-control">
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="apellido_pat">Apellido Paterno</label>
            <input type="text" name="apellido_pat" id="apellido_pat" class="form-control" required
                   placeholder="Ingrese el apellido paterno">
        </div>
        <div class="col-md-6">
            <label class="form-control-label" for="apellido_mat">Apellido Materno</label>
            <input type="text" name="apellido_mat" id="apellido_mat" class="form-control" required
                   placeholder="Ingrese el apellido materno">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            <label for="telefono">TELEFONO</label>
            <input type="number" name="telefono" id="telefono" class="form-control" placeholder="+591 ### ## ###"
                   pattern="[0-9]{0,15}">
        </div>
        <div class="col-md-8">
            <label class="form-control-label" for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese el email">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="role">ROL</label>
            <select name="rol" id="rol" class="form-control">
                <option value="ADMINISTRADOR">Administrador</option>
                <option value="ASISTENTE">Asistente</option>
            </select>
        </div>
        <div class="col-4">
            <label for="packing">NICK</label>
            <input type="text" name="nick" id="nick" class="form-control" placeholder="Ingrese el nick" required>
        </div>
        <div class="col-4">
            <label for="packing">CONTRASEÑA</label>
            <input type="password" name="password" id="password" class="form-control"
                   placeholder="************" required>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="btn">Editar</button>
</div>