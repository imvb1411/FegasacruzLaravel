<div class="modal-body">
    <input type="hidden" name="id" id="id" class="form-control">

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">Clientes</label>
            <select class="form-control" name="cliente_id" id="cliente_id" required>              
                <option value="0" disabled>Seleccione</option>   
                @foreach($clientes as $cli)
                    <option value="{{$cli->id}}">{{$cli->apellido_pat}} {{$cli->apellido_mat}} {{$cli->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">Registrador</label>
                <input type="text" class="form-control" name="registrador_id" id="registrador_id" placeholder="{{\Illuminate\Support\Facades\Auth::user()->nick}}" disabled="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="actividad_id">Actividad</label>
            <select class="form-control" name="actividad_id" id="actividad_id" required>              
                <option value="0" >Seleccione</option>   
                @foreach($actividades as $act)
                    <option value="{{$act->id}}"> {{$act->codigo}} {{$act->nombre}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="gestion">Gestion</label>
                <input type="number" class="form-control" id="gestion" name="gestion" required >    
            </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="nro_hectareas">Nro. Hectareas</label>
            <input type="number" step="0.01" class="form-control" id="nro_hectareas" name="nro_hectareas" required placeholder="">    
        </div>
        
        <div class="col-md-6">
            <label class="form-control-label" for="nro_orden">Nro. Orden</label>
            <input type="number" class="form-control" id="nro_orden" name="nro_orden" required placeholder="">    
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3">
            <label class="form-control-label" for="ubicacion_id">Ubicacion</label>
            <select class="form-control" name="ubicacion_id" id="ubicacion_id" required onchange="getUbicaciones('provincia_id',this.value)">
                <option value="0">Seleccione</option>   
                @foreach($ubicaciones as $ubi)
                    <option value="{{$ubi->id}}">{{$ubi->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-control-label" for="provincia_id">Provincia</label>
            <select class="form-control" name="provincia_id" id="provincia_id" required onchange="getUbicaciones('municipio_id',this.value)">
                <option value="0">Seleccione</option>

            </select>
        </div>
        <div class="col-md-3">
            <label class="form-control-label" for="municipio_id">Municipio</label>
            <select class="form-control" name="municipio_id" id="municipio_id" required onchange="getUbicaciones('zona_id',this.value)">
                <option value="0">Seleccione</option>

            </select>
        </div>
        <div class="col-md-3">
            <label class="form-control-label" for="zona_id">Zona</label>
            <select class="form-control" name="zona_id" id="zona_id" required onchange="getUbicaciones('subzona_id',this.value)">
                <option value="0">Seleccione</option>

            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3">
            <label class="form-control-label" for="subzona_id">Sub zona</label>
            <select class="form-control" name="subzona_id" id="subzona_id" required onchange="getUbicaciones('sitio_id',this.value)">
                <option value="0">Seleccione</option>

            </select>
        </div>
        <div class="col-md-3">
            <label class="form-control-label" for="sitio_id">Sitio</label>
            <select class="form-control" name="sitio_id" id="sitio_id" required>
                <option value="0">Seleccione</option>

            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <label class="form-control-label" for="tipo_solicitud">Tipo Formulario</label>
            <select class="form-control" name="tipo_solicitud" id="tipo_solicitud" onChange="formulario(this.value);" required>              
                <option value="0" >Seleccione Formulario</option>   
                <option value="form280">Formulario 280</option>
                <option value="form701">Formulario 701</option>
            </select>
        </div>
    </div>
    @include('solicitud.form280')
    @include('solicitud.form701')
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="btn">Editar</button>
</div>