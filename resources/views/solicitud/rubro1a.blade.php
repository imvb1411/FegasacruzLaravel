<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">1. Propiedad Agrícola</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            @for ($i = 0; $i < 2; $i++)
                <div class="col-md-6">
                    <label class="form-control-label" for="">Cód. {{$rubros[0]->detalle[$i]->codigo}}
                        - {{$rubros[0]->detalle[$i]->nombre}}</label>
                </div>
            @endfor
        </div>
        <div class="form-group row">
            @for ($i = 0; $i < 2; $i++)
                <div class="col-md-6">
                    <input type="number" class="form-control" id="{{$rubros[0]->detalle[$i]->id}}"
                           name="detalle[{{$rubros[0]->detalle[$i]->id}}]" placeholder="">
                </div>
            @endfor
        </div>
        <div class="form-group row">
            @for ($i = 2; $i < 4; $i++)
                <div class="col-md-6">
                    <label class="form-control-label" for="">Cód. {{$rubros[0]->detalle[$i]->codigo}}
                        - {{$rubros[0]->detalle[$i]->nombre}}</label>
                </div>
            @endfor
        </div>
        <div class="form-group row">
            @for ($i = 2; $i < 4; $i++)
                <div class="col-md-6">
                    <input type="number" class="form-control" id="{{$rubros[0]->detalle[$i]->id}}"
                           name="detalle[{{$rubros[0]->detalle[$i]->id}}]" placeholder="">
                </div>
            @endfor
        </div>
    </div>
</div>