<div class="modal-body">
    <input type="hidden" name="id" id="id" class="form-control">
    <div class="row">
        <div class="col-6">
            <label for="tipo">TIPO</label>
            <select name="tipo" class="form-control" id="tipo" onchange="changeTipo()">
                <option value="0">Seleccione</option>
                <option value="1">Departamentos</option>
                <option value="2">Provincia</option>
                <option value="3">Municipio</option>
                <option value="4">Zona</option>
                <option value="5">Sub Zona</option>
                <option value="6">Sitio</option>
            </select>
        </div>
        <div id="divDep" class="col-6" style="display:none">
            <label for="ubicacion_id">DEPARTAMENTO</label>
            <select name="ubicacion_id" id="ubicacion_id" required onchange="getUbicaciones('provincia_id',this.value)" class="form-control" >            
            <option value="0">Seleccione</option>    
                @foreach($departamentos as $dep)
                    <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div id="divProv" class="col-6" style="display:none">
            <label for="ubicacion_id">PROVINCIA</label>
            <select name="provincia_id" id="provincia_id" class="form-control" required onchange="getUbicaciones('municipio_id',this.value)">
            <option value="0">Seleccione</option>
            </select>
        </div>
        <div id="divMun" class="col-6" style="display:none">
            <label for="ubicacion_id">MUNICIPIO</label>
            <select name="municipio_id" id="municipio_id" required onchange="getUbicaciones('zona_id',this.value)" class="form-control" >
            <option value="0">Seleccione</option>
            </select>
        </div>
        <div id="divZon" class="col-6" style="display:none">
            <label for="ubicacion_id">ZONA</label>
            <select name="zona_id" id="zona_id" required onchange="getUbicaciones('subzona_id',this.value)" class="form-control" >
            <option value="0">Seleccione</option>
            </select>
        </div>
        <div id="divSub" class="col-6" style="display:none">
            <label for="ubicacion_id">SUBZONA</label>
            <select name="subzona_id" id="subzona_id" required class="form-control" >
            <option value="0">Seleccione</option>
            </select>
        </div>
        <div id="divSit" class="col-6" style="display:none">
            <label for="ubicacion_id">SITIO</label>
            <select name="sitio_id" id="sitio_id" class="form-control" >
            <option value="0">Seleccione</option>
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
