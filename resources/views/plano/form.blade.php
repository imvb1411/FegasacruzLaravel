<div class="modal-body">
    <input type="hidden" name="id" id="id" class="form-control">
    
    <div class="form-group row">
        <div class="col-md-9">
            <label class="form-control-label" for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" >
        </div>
        <div class="col-md-3">
            <label class="form-control-label" for="solicitud_id">Solicitud</label>
            <select class="form-control" name="solicitud_id" id="solicitud_id" required>              
                <option value="0" disabled>Seleccione</option>   
                @foreach($solicitudes as $sol)
                   <option value="{{$sol->id}}">Solicitud N°{{$sol->id}}</option>
                @endforeach
                </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label class="form-control-label" for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required placeholder="Detalle del titulo">    
        </div>
        </div>
</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn">Editar</button>
    </div>