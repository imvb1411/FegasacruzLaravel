<div id="form701" style="display: none;">
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="ddjj_original">ddjj original</label>
            <input type="text" class="form-control" id="ddjj_original" name="ddjj_original"
                   placeholder="Detalle el rubro">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="folio">folio</label>
            <input type="text" class="form-control" id="folio" name="folio" placeholder="Detalle el rubro">
        </div>
        <div class="col-md-6">
            <label class="form-control-label" for="nro_titulopropiedad">Número Titulo de Propiedad</label>
            <input type="text" class="form-control" id="nro_titulopropiedad" name="nro_titulopropiedad"
                   placeholder="Detalle el rubro">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <h3>Rubro {{$rubros[0]->id}} - {{$rubros[0]->nombre}}</h3>
            <div class="col-md-12">
                @include('solicitud.rubro1a')
                @include('solicitud.rubro1b')
                @include('solicitud.rubro1c')
            </div>
        </div>
    </div>
    @for($i=1;$i<4;$i++)
        <div class="form-group row">
            <div class="col-md-12">
                <h3>Rubro {{$rubros[$i]->id}} - {{$rubros[$i]->nombre}}</h3>
                <div class="col-md-12">
                    @foreach($rubros[$i]->detalle as $det2)
                        <div class="form-group row">
                            <label class="form-control-label">{{$det2->correlativo}}. Cód. {{$det2->codigo}}
                                - {{$det2->nombre}}</label>
                            <input type="number" class="form-control" id="{{$det2->id}}"
                                   name="{{$det2->id}}" placeholder="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endfor

</div>