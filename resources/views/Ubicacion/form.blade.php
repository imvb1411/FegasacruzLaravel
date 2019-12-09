<div class="modal-body">
    <input type="hidden" name="id" id="id" class="form-control">
    <div class="row">
        <div class="col-6">
            <label for="tipo">TIPO</label>
            <select name="tipo" class="form-control" id="tipo" onchange="changeTipo()">
                <option value="1">Departamentos</option>
                <option value="2">Provincia</option>
            </select>
        </div>
        <div id="divDep" class="col-6" style="display:none">
            <label for="ubicacion_id">DEPARTAMENTO</label>
            <select name="ubicacion_id" id="ubicacion_id" class="form-control" >
                @foreach($departamentos as $dep)
                    <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" step="any" required>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="btn">Editar</button>
</div>