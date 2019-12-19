@extends('layouts.master')
@section('title', 'Solicitud 701')
    @section('header-title','Vista de Consulta')
    @section('header-content')
    <div class="row">
        <div class="col-3">
        <a href="{{URL::action('SolicitudController@print',$solicitud->id)}}" class="btn btn-warning">Imprimir</a>
        </div>
    </div>
@endsection
@section('vistas')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 float-sm-right">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Visitas</span>
                    {{-- <span class="info-box-number">{{$view->vistas}}</span> --}}
                    <span class="info-box-number">total</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <input type="hidden" name="id" id="id" class="form-control">
    <h2 class="text-center">REGIMEN AGROPECUARIO UNIFICADO</h2><br/>
    <h3 class="text-center">FORMULARIO 701V.3</h3><br/>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-9">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                NOMBRE(S) Y APELLIDO(S) O RAZON SOCIAL DEL CONTRIBUYENTE
                            </div>
                        </div>
                        <div class="card-body">
                            CAROLINA BALCAZAR DE AÑEZ
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                NUMERO DE ORDEN
                            </div>
                        </div>
                        <div class="card-body">
                            7026656264
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bg-secondary color-palette">
                                    <div class="card-header">
                                        NIT
                                    </div>
                                </div>
                                <div class="card-body">
                                    3156489465
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bg-secondary color-palette">
                                    <div class="card-header">
                                        GESTION
                                    </div>
                                </div>
                                <div class="card-body">
                                    2017
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bg-secondary color-palette">
                                    <div class="card-header">
                                        DD.JJ.ORIGINAL
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row"><code>Cod <br> 534</code> </div>
                                         
                                        </div>
                                        <div class="col-8 row">
                                            1555566
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                FOLIO
                            </div>
                        </div>
                        <div class="card-body">
                            Numero Folio
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
    <br>
    <h3>DATOS BASICOS DE LA DECLARACION JURADA QUE RECTIFICA</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                NUMERO DE RESOLUCION ADMINISTRATIVA
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                 <div class="row"><code>Cod <br> 518</code> </div> 
                                </div>
                                <div class="col-10">
                                    1555566
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                FORMULARIO
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row"><code>Cod <br> 537</code> </div>
                                 
                                </div>
                                <div class="col-8 row">
                                    1555566
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                               VERSIÓN
                            </div>
                        </div>
                        <div class="card-body">
                            1.0
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                N° DE ORDEN
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row"><code>Cod <br> 521</code> </div>
                                 
                                </div>
                                <div class="col-8 row">
                                    1555566
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <h3>INFORMACION DE PROPIEDAD</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                N° DE TITULO DE PROPIEDAD
                            </div>
                        </div>
                        <div class="card-body">
                            786512224533265
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="bg-secondary color-palette col-11">
                                <div class="card-header">
                                    ZONA
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            SUBTROPICAL
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="bg-secondary color-palette col-11">
                                <div class="card-header">
                                   SUBZONA
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            SANTA CRUZ
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="bg-secondary color-palette">
                                <div class="card-header">
                                    COD. MUNICIPIO
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            71127
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Rubro 1 (ID)
                </div>
                <div class="card-header">
                    Nombre Rubro
                </div>
                <div class="row">
                    <div class="card-body">
                        <div class="row"></div>
                        <table>
                            <tr>
                                <td class="bg-secondary disabled color-palette">
                                   1
                                </td>
                                <td>
                                    Propiedad <br> Agricola
                                </td>
                                <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 013
                                 </td>
                                 <td style="width: 250px" class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette">Extension total del predio segun titulo de propiedad, expendiente de dotacion o consolidacion</div>
                                        valor
                                    </div>
                                 </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row"><div class="col-12"><div class="card-header"></div></div></div>
                <div class="row">
                    <div class="card-body">
                        fila 2
                    </div>
                </div>
                <div class="row"><div class="col-12"><div class="card-header"></div></div></div>
                <div class="row">
                    <div class="card-body">
                        fila 3
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection