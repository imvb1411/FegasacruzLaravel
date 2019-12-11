<div class="modal-body">
    <input type="hidden" name="id" id="id" class="form-control">

    <div class="form-group row">
        <div class="col-md-12">
        <label class="form-control-label" for="nombre">Nombre de Rubro</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Ingrese el nombre">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class="form-control-label" for="solicitud_id">Actividad</label>
            <select class="form-control" name="solicitud_id" id="solicitud_id" required>              
                <option value="0" disabled>Seleccione</option>   
                {{-- @foreach($solicitudes as $sol)
                    <option value="{{$sol->id}}">Solicitud N°{{$sol->id}}</option>
                @endforeach --}}
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="solicitud_id">Clientes</label>
            <select class="form-control" name="solicitud_id" id="solicitud_id" required>              
                <option value="0" disabled>Seleccione</option>   
                {{-- @foreach($solicitudes as $sol)
                    <option value="{{$sol->id}}">Solicitud N°{{$sol->id}}</option>
                @endforeach --}}
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
            </select>
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="solicitud_id">Vendedor</label>
                <input type="text" class="form-control" placeholder="Enter ..." disabled="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="solicitud_id">Ubicacion</label>
            <select class="form-control" name="solicitud_id" id="solicitud_id" required>              
                <option value="0" disabled>Seleccione</option>   
                {{-- @foreach($solicitudes as $sol)
                    <option value="{{$sol->id}}">Solicitud N°{{$sol->id}}</option>
                @endforeach --}}
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
                <option value="">Solicitud N°</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-control-label" for="descripcion">Nro. Orden</label>
            <input type="descripcion" class="form-control" id="descripcion" name="descripcion" required placeholder="Detalle el rubro">    
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="descripcion">Nro. Hectareas</label>
            <input type="descripcion" class="form-control" id="descripcion" name="descripcion" required placeholder="Detalle el rubro">    
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="btn">Editar</button>
</div>